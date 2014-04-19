
git clone https://github.com/gmarik/vundle.git ~/.vim/bundle/vundle
:autocmd FileType php noremap <C-M> :w!<CR>:!/usr/bin/php %<CR>i
:map <C-M> :w!<CR>:!/usr/bin/php %<CR>


set nocompatible              " be iMproved, required
filetype off                  " required
" set the runtime path to include Vundle and initialize
set rtp+=~/.vim/bundle/vundle/
call vundle#rc()

Bundle 'gmarik/vundle'

" Displays tags in a window, ordered by class etc, i used it instead of taglist  
Bundle 'majutsushi/tagbar'  


Bundle 'neocomplcache'
Bundle 'Shougo/neocomplcache'
Bundle "pangloss/vim-javascript"

Bundle 'grep.vim'  
Bundle 'a.vim'  
Bundle 'The-NERD-Commenter'  
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

Bundle 'Color-Sampler-Pack'  
Bundle 'altercation/vim-colors-solarized' 

Bundle 'Lucius'
Bundle "garbas/vim-snipmate"
Bundle 'mattn/zencoding-vim'  
Bundle 'joonty/vim-phpunitqf.git'
"Bundle "phpunit"
Bundle 'prefixer.vim'

Bundle 'Lokaltog/vim-powerline'  


"自定义关联文件类型
au BufNewFile,BufRead *.less set filetype=css



" solarized theme  
set t_Co=256                " Explicitly tell vim that the terminal supports 256 colors, need before setting the colorscheme  
let g:solarized_termcolors=256  
colorscheme solarized  
set background=dark  
  
au BufNewFile,BufRead *.phtml set filetype=php
au BufRead,BufNewFile *.js set ft=javascript.jquery

""---NeoComplCache 启动
let g:neocomplcache_enable_at_startup = 1 

filetype plugin indent on


"编码设置
set enc=utf-8
set fencs=utf-8,ucs-bom,shift-jis,gb18030,gbk,gb2312,cp936
"语言设置
set helplang=cn
set encoding=utf8 
set langmenu=zh_CN.UTF-8 

"set guifont=Monaco:h9
"set guifont=PowerlineSymbols\ for\ Powerline

"set gfw=YaHei\ Consolas\ Hybrid:h9
"set guifont=Consolas:h12
"set guifont=YaHei\ Consolas\ Hybrid:h12
"set guifont=Yahei\ Mono:h12

set guifont=Monaco:h12    " set fonts for gui vim
"set transparency=5        " set transparent window
set guioptions=egmrt  " hide the gui menubar



set number

" 自动切换当前目录为当前文件所在的目录
set autochdir

"Set to auto read when a file is changed from the outside  
set autoread

set ruler

"set nobackup
" 下面两行改变备份文件存放路径  
" set backupdir=~/.vim/backup  
" set directory=~/.vim/backup 


"powerline的设置
let g:Powerline_symbols = 'fancy'
"set fillchars+=stl: ,stlnc:
set t_Co=256
let g:Powerline_cache_enabled = 1
"let g:Powerline_cache_file='~/.vim/bundle/vim-powerline/Powerline_default_default_fancy.cache'
set laststatus=2   " Always show the statusline
set statusline=%F%m%r%h%w\ %{&ff}\ %Y\ [ascii:%b\ hex:0x\%02.2B]\ [%{(&fenc\ ==\ \"\"?&enc:&fenc).(&bomb?\",BOM\":\"\")}]\ %=%l/%L,%v\ %p%% 
"set statusline=%F%m%r%h%w\ [FORMAT=%{&ff}]\ [TYPE=%Y]\ [POS=%l,%v][%p%%]\ %{strftime(\"%d/%m/%y\ -\ %H:%M\")}
let Powerline_symbols = 'compatible' 

"set guifont=PowerlineSymbols\ for\ Powerline


" allow backspacing over everything in insert mode  
set backspace=indent,eol,start 

set autoindent


" Tab related  
set shiftwidth=4  
set tabstop=4  
set softtabstop=4  
set expandtab               " Use spaces instead of tabs  
                           
set list  
set listchars=tab:\|\ ,     " 显示Tab符，使用一高亮竖线代替  

" NERDTree options  
let NERDTreeChDirMode=2  
let g:NERDTreeWinSize = 23  


" Tagbar options  
let g:tagbar_width = 30 


function! ToggleNERDTreeAndTagbar()
    let w:jumpbacktohere = 1

    " Detect which plugins are open
    if exists('t:NERDTreeBufName')
        let nerdtree_open = bufwinnr(t:NERDTreeBufName) != -1
    else
        let nerdtree_open = 0
    endif
    let tagbar_open = bufwinnr('__Tagbar__') != -1

    " Perform the appropriate action
    if nerdtree_open && tagbar_open
        NERDTreeClose
        TagbarClose
    elseif nerdtree_open
        TagbarOpen
    elseif tagbar_open
        NERDTree
    else
        NERDTree
        TagbarOpen
    endif

    " Jump back to the original window
    for window in range(1, winnr('$'))
        execute window . 'wincmd w'
        if exists('w:jumpbacktohere')
            unlet w:jumpbacktohere
            break
        endif
    endfor
endfunction

nmap <F8> :call ToggleNERDTreeAndTagbar()<CR>


