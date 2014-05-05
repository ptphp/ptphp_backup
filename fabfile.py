# coding: utf-8
from fabric.api import env, local, cd, run
from fabric.operations import put

def gitpush():
    local('git add --all')
    local('git commit -a')
    local('git push origin master')