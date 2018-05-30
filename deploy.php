<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'inovasi');

// Project repository
set('repository', 'https://github.com/prasejaya/inovasi.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
//set('shared_files', []);
//set('shared_dirs', []);

// Writable dirs by web server 
set('writable_dirs', []);


// Hosts

host('192.168.1.11')
    ->user('debian')
    ->set('deploy_path', '/home/www/inovasi/server1/');

host('192.168.1.11')
   ->user('debian')
   ->set('deploy_path','/home/www/inovasi/server2/');   
    

// Tasks

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
