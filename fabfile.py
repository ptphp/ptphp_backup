# coding: utf-8
from fabric.api import env, local, cd, run
from fabric.colors import *
from fabric.operations import put

env.hosts = "162.243.144.109"
env.user = "root"
env.key_filename = "C:\\Users\\Amy\\.ssh\\id_rsa"
env.usesshconfig = True
env.timeout = 20

def gitpush():
    local('git add --all')
    local('git commit -m "deploy"')
    local('git push origin master')

def deploy():
    gitpush();
    remote_dir = "/var/www/ptphp.com"
    with cd(remote_dir):
        #run("git remote add origin git@github.com:ptphp/PtPHP.git")
        #run("git add .")
        #run("git commit -m 'init'")
        run("git pull origin master")
        #run("git push origin master")
