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
    local('git commit -a')
    local('git push origin master')

def deploy():
    #gitpush();
    remote_dir = "/var/www/"
    with cd(remote_dir):
        run("ls")