<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    15.03.13 19:06
 */

?>
<style type="text/css">
html, body, div, span, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, acronym, address, big, cite, code, del, dfn, em, img, small, strike, strong, sub, sup, b, u, i, center, dl, dt, dd,fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, footer, header, menu, nav {
    margin: 0;
    padding: 0;
    border: 0;
    vertical-align: baseline; }
body {
    line-height: 1; }
ul {
    padding: 0;
    list-style: none; }
#content{
    padding-top: 35px;
}
#content ul li:before{
    content: "» ";
    color:#999;
    margin-left:3px
}
table {
    border-collapse: collapse;
    border-spacing: 0;
}

body {
    background: #fff;
    font: 14px/21px "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
    color: #444;
}



p img { margin: 0; }

em { font-style: italic; }
strong { font-weight: bold; color: #333; }

hr { border: solid #ddd; border-width: 1px 0 0; clear: both; margin: 10px 0 30px; height: 0; }
a:hover, a:focus { color: #000; }
ul, ol { margin-bottom: 20px; }
ul {  }
ol { list-style: decimal; }
li p { line-height: 21px; }
.container                                  { position: relative; width: 960px; margin: 0 auto; padding: 0; }
.container .column,
.container .columns                         { float: left; display: inline; margin-left: 10px; margin-right: 10px; }
.row                                        { margin-bottom: 20px; }
.container .one.column,
.container .one.columns                     { width: 40px;  }
.container .two.columns                     { width: 100px; }
.container .three.columns                   { width: 160px; }
.container .four.columns                    { width: 220px; }
.container .five.columns                    { width: 280px; }
.container .six.columns                     { width: 340px; }
.container .seven.columns                   { width: 400px; }
.container .eight.columns                   { width: 460px; }
.container .nine.columns                    { width: 520px; }
.container .ten.columns                     { width: 580px; }
.container .eleven.columns                  { width: 640px; }
.container .twelve.columns                  { width: 700px; }
.container .thirteen.columns                { width: 760px; }
.container .fourteen.columns                { width: 820px; }
.container .fifteen.columns                 { width: 880px; }
.container .sixteen.columns                 { width: 940px; }

.container .one-third.column                { width: 300px; }
.container .two-thirds.column               { width: 620px; }
.container .offset-by-one                   { padding-left: 60px;  }
.container .offset-by-two                   { padding-left: 120px; }
.container .offset-by-three                 { padding-left: 180px; }
.container .offset-by-four                  { padding-left: 240px; }
.container .offset-by-five                  { padding-left: 300px; }
.container .offset-by-six                   { padding-left: 360px; }
.container .offset-by-seven                 { padding-left: 420px; }
.container .offset-by-eight                 { padding-left: 480px; }
.container .offset-by-nine                  { padding-left: 540px; }
.container .offset-by-ten                   { padding-left: 600px; }
.container .offset-by-eleven                { padding-left: 660px; }
.container .offset-by-twelve                { padding-left: 720px; }
.container .offset-by-thirteen              { padding-left: 780px; }
.container .offset-by-fourteen              { padding-left: 840px; }
.container .offset-by-fifteen               { padding-left: 900px; }


.container:after { content: "\0020"; display: block; height: 0; clear: both; visibility: hidden; }
.clearfix:before,
.clearfix:after,
.row:before,
.row:after {
    content: '\0020';
    display: block;
    overflow: hidden;
    visibility: hidden;
    width: 0;
    height: 0; }
.clear {
    clear: both;
    display: block;
    overflow: hidden;
    visibility: hidden;
    width: 0;
    height: 0;
}

.clearfix {
    zoom:1
}
.clearfix:before,.clearfix:after {
    display:table;
    content:""
}
.clearfix:after {
    clear:both
}
body {
    font-family:Helvetica,sans-serif;
    font-size:14px;
    line-height:1.5;
    color:#000000;
    font-smooth:always;
    -webkit-font-smoothing:subpixel-antialiased
}
a {
    color:#444;
    text-decoration:none
}
a:hover,a.active {
    color:#2f2f2f;
    text-decoration:none
}
a:active {
    color:#282828
}
h1,h2,h3,h4,h5 {
    margin:0;
    padding:0;
    border:0 none;
    font-family:Helvetica,sans-serif;
    font-smooth:always;
    -webkit-font-smoothing:subpixel-antialiased;
    line-height:1.3;
    position:relative
}
h1 {
    font-size:25px
}
h2 {
    font-size:20px
}
h3 {font-size:18px
}
h4 {font-size:16px
}
h5 {font-size:13px
}
ul,ol {margin-bottom:20px;
}
p {
    margin-bottom:10px;
    line-height:1.5;
    font-smooth:always;
    word-break:break-word;
    -webkit-font-smoothing:subpixel-antialiased
}

.logo_txt {
    font-family:'Pacifico',cursive!important;
    font-size:35px;
    text-decoration:none
}
.sep {
    border-bottom:1px solid #f4f4f4;
    margin-left:10px;
    margin-right:10px;
    position:relative;
    top:-1px
}

.bordered_title {
    border-bottom:1px solid #ebebeb;
    padding-bottom:10px;
    margin-bottom:10px
}

header {

    width:960px;
    padding:0;
    margin:0 auto;
    position:relative;
    z-index:10000;
    margin-bottom:5px;
}
header #site_header {
    background:#fff;
    margin-bottom:0;
    zoom:1
}

header #site_header .logo_env .logo_txt {
    color: #ffffff;
    display:inline-block;
    padding-top:5px;
    padding-bottom:5px
}
header #site_header #site_menu .main_menu {
    position:relative;
    float:right;
    margin-bottom:0;
    z-index:150;
    zoom:1
}
header #site_header #site_menu .main_menu li{
    padding-right: 20px;
    display: inline;
}
header #site_header #site_menu .main_menu li a:link,header #site_header #site_menu .main_menu li a:visited{
    color: #ffffff;
}
header #site_header #site_menu .main_menu li a:hover{
    color: #dddddd;
    border-bottom: 2px solid #000;
    padding-bottom: 5px;
}
#homepage_posts {
    margin:0 0 0 10px;
    padding: 5px;
    width:640px
}

footer.expanded {
    background:#000
}
footer.expanded #footer {
    margin-bottom:0
}
footer.expanded .footer_bottom {
    margin-bottom:0
}
footer #footer {
    padding-top:15px;
    margin-bottom:0;
    color:#fff;
    zoom:1
}
footer #footer:after {
    clear:both
}
footer #footer {
    padding-top:15px;
    padding-bottom:15px
}
footer #footer a {
    color:#fafafa;
}
footer #footer a:hover {
    color:#ccc
}
footer #footer strong {
    color:#fff
}
footer #footer .footer_block {
    float:left;
    width:273px;
    margin-left:20px;
    margin-right:20px
}
footer #footer .footer_block .title {
    color:#fff;
    border-bottom:1px solid #ffffff;
    padding-bottom:10px;
    margin-bottom:10px
}

footer .footer_bottom {
    background:#000;
    padding:15px 0;
    margin-bottom:20px;
    zoom:1
}
footer .footer_bottom p, a:link,footer .footer_bottom a:visited{
    color: #ffffff;
}
footer .footer_bottom a:hover{
    color: #dddddd;
    text-decoration:    underline;
}
.sidebar_entry {
    margin-bottom:25px
}
.sidebar_entry ul li {
    color:#d3d3d3;
    padding-bottom:4px;
    font-size:13px
}
.sidebar_entry ul li a {
    color:#777;
}
.sidebar_entry ul li a:hover {
    color:#5e5e5e
}
.sidebar_entry p {
    color:#777
}

.sidebar_entry.sidebar_entry {
    border:1px solid #f1f1f1;
    padding:10px 15px
}
.sidebar_entry.sidebar_entry .sidebar_title {
    position:relative;
    color:#282828;
    font-size:20px;
    line-height:1.3;
    border-bottom:1px solid #f1f1f1;
    padding-bottom:10px;
    margin-bottom:15px
}


.sidebar_entry.widget_meta li>a,.sidebar_entry.widget_archive li>a,.sidebar_entry.widget_categories li>a,.sidebar_entry.widget_recent_entries li>a {
    padding:5px 0;
    display:block
}

.sidebar_entry.widget_categories li:hover {
    background:#fafafa
}
.sidebar_entry.widget_categories li:hover>a {
    color:#2f2f2f
}
.sidebar_entry.widget_categories li a {
    display:inline-block
}
pre {
    position:relative;
    font-family:'Courier New',sans-serif;
    line-height:20px;
    font-size:12px;
    color:#000;
    background:#f2f2f2;
    display:block;
    padding:5px 20px;
    margin-bottom:25px;
    white-space:pre-wrap;
    word-break:break-word
}

footer .blog_stats p {
    font-size:13px
}
footer .blog_stats .stats li {
    zoom:1;
    font-family:Helvetica,sans-serif;
    font-size:16px;
    margin-bottom:5px;
    line-height:28px
}
footer .blog_stats .stats li:after {
    clear:both
}
footer .blog_stats .stats li span {
    display:block;
    float:left;
    background:#fff;
    color:#000;
    padding:5px;
    font-size:16px;
    margin-right:7px;
    line-height:1
}

.sidebar {
    width:220px;
    margin:0 !important;
    padding: 0 !important;
}
#wrap{
    background: #000000;
    border-bottom: 1px solid #4e4e4e;

}
.blue #wrap{background: #009AFF;}
.blue .footer_bottom{background: #008EEB; border-top: 2px solid #000;}
.blue .sidebar_entry.sidebar_entry .sidebar_title{color: #008EEB;}

.orange #wrap{background: #F38917;}
.orange .footer_bottom{background: #EA7F0C; border-top: 2px solid #000;}
.orange .sidebar_entry.sidebar_entry .sidebar_title{color: #EA7F0C;}


.purple #wrap{background: #662D91;}
.purple footer.expanded{background: #662D91;}
.purple .footer_bottom{background: #5B2881; border-top: 2px solid #000;}
.purple .sidebar_entry.sidebar_entry .sidebar_title{color: #5B2881;}


.dimred #wrap{background: #A3001D;}
.dimred .footer_bottom{background: #8F0019; border-top: 2px solid #000;}
.dimred .sidebar_entry.sidebar_entry .sidebar_title{color: #8F0019;}



.pastelred #wrap{background: #D93629;}
.pastelred .footer_bottom{background: #CA3024; border-top: 2px solid #000;}
.pastelred .sidebar_entry.sidebar_entry .sidebar_title{color: #CA3024;}
</style>