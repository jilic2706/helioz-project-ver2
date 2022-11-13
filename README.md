## Technologies Used
### Frontend
- Blade + Tailwind CSS
### Backend
- PHP Laravel
- MySQL

## Requirements
### For Windows
- [Windows Subsystem for Linux (WSL)](https://docs.microsoft.com/en-us/windows/wsl/install) + Ubuntu XX.XX LTS (personally used [20.04](https://apps.microsoft.com/store/detail/ubuntu-20044-lts/9MTTCL66CPXJ))
- (OPTIONAL) [Windows Terminal](https://apps.microsoft.com/store/detail/windows-terminal/9N0DX20HK701?hl=en-us&gl=US)
- Hyper-V enabled
- [Docker Desktop](https://www.docker.com/products/docker-desktop/)
- [TablePlus](https://tableplus.com/)

## Building And Running
- Ensure Docker Desktop is running
- (OPTIONAL) In the bash, execute the following command to create an alias for ease of starting and stopping the containers: *alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'*
- (VERY IMPORTANT FOR THE FOLLOWING FEW STEPS) Because the vendor directory is NOT included in the repo and - thus - you cannot execute ANY sail-related command out of the box, the following command should be executed: 
    - *docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v $(pwd):/var/www/html \
        -w /var/www/html \
        laravelsail/php81-composer:latest \
        composer install --ignore-platform-reqs*
- Navigate to the project folder upon cloning and execute *./vendor/bin/sail up -d* (or *sail up -d* if you've defined the aforementioned alias)
- Create a new MySQL connection in TablePlus via credentials found in the .env.example file
- Execute the following chain of commands: *sail artisan migrate --seed && npm install && npm run watch*
    - it is entirely possible the npm commands will not work because of some sort of incompatabilities Laravel has with Vite 
