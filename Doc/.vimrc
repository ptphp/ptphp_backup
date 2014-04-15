set nu!
set ruler
set nobackup
set shiftwidth=4
set tabstop=4
set expandtab
set autoindent

set nocompatible              " be iMproved, required
filetype off                  " required
" set the runtime path to include Vundle and initialize
set rtp+=~/.vim/bundle/vundle/
call vundle#rc()

Bundle 'gmarik/vundle'
Bundle 'neocomplcache'
Bundle 'Shougo/neocomplcache'
Bundle "pangloss/vim-javascript"
Bundle 'The-NERD-tree'
Bundle 'JavaScript-syntax'
Bundle 'jQuery'
Bundle 'othree/html5.vim'
Bundle 'groenewege/vim-less'
Bundle 'Markdown'
Bundle 'Markdown-syntax'
Bundle 'php.vim-html-enhanced'
Bundle "MarcWeber/vim-addon-mw-utils"
Bundle "tomtom/tlib_vim"
Bundle "snipmate-snippets"

Bundle 'Lucius'
Bundle "garbas/vim-snipmate"
Bundle 'mattn/zencoding-vim'  
Bundle 'joonty/vim-phpunitqf.git'
"Bundle "phpunit"
Bundle 'prefixer.vim'
"自定义关联文件类型
au BufNewFile,BufRead *.less set filetype=css
au BufNewFile,BufRead *.phtml set filetype=php
au BufRead,BufNewFile *.js set ft=javascript.jquery

""---NeoComplCache 启动
let g:neocomplcache_enable_at_startup = 1 

filetype plugin indent on



set guifont=Monaco:h9
""set gfw=YaHei\ Consolas\ Hybrid:h9
"set guifont=Consolas:h12
""set guifont=YaHei\ Consolas\ Hybrid:h12
"set guifont=Yahei\ Mono:h12

