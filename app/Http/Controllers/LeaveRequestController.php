<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class LeaveRequestController extends Controller
{
    private function getLeaveRequestsPerDepartment(Collection $users) {
        $leave_requests = [];
        foreach($users as $user) {
            $leave_requests_per_user = $user->leaveRequests()->get();
            if(count($leave_requests_per_user) > 0) {
                $leave_requests[$user->name] = $leave_requests_per_user;
            }
        }
        return $leave_requests;
    }

    public function index() {
        if(auth()->user()->role == 'admin') {
            $all_leave_requests = [];
            $all_users = [];
            $all_departments = Department::all();
            foreach ($all_departments as $department) {
                $all_users[$department->name] = $department->users()->get();
            }

            foreach ($all_users as $department_name => $users) {
                $all_leave_requests[$department_name] = $this->getLeaveRequestsPerDepartment($users);
            }
            return view('leave-requests.index', [
                'all_leave_requests' => $all_leave_requests
            ]);
        } else if(auth()->user()->is_dept_head && auth()->user()->role != 'admin') {
            $department = Department::where('id', auth()->user()->dept_id)->first();
            $department_users = $department->users()->get();
            $department_leave_requests = $this->getLeaveRequestsPerDepartment($department_users);
            return view('leave-requests.index', [
                'dept_name' => $department->name,
                'dept_leave_requests' => $department_leave_requests,
            ]);
        }
    }

    /* public function show() {
        return view('leave-requests.show');
    } */

    public function create() {
        return view('leave-requests.create');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'date_from' => 'required',
            'date_to' => 'required',
            'reason' => 'required'
        ]);

        $formFields['user_id'] = auth()->id();

        LeaveRequest::create($formFields);

        return redirect('leave-requests/manage')->with('message', 'Leave request submitted and awaiting review.');
    }

    // public function edit() {}

    public function update(Request $request, LeaveRequest $leave_request) {
        $status_update = $request->input('status');

        $leave_request->status = $status_update;

        $leave_request->save();

        return back()->with('message', 'Leave request status updated.');
    }

    public function destroy(LeaveRequest $leave_request) {
        if($leave_request->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $leave_request->delete();

        return redirect('leave-requests/manage')->with('message', 'Leave request deleted.');
    }

    public function manage() {
        return view('leave-requests.manage', [
            'leave_requests' => auth()->user()->leaveRequests()->get()
        ]);
    }
}
