<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>GitHub Search</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function()
                {
                    $("#search").click(
                        function()
                        {   var $loading = $("<div class='loading-wait'></div>");
                            $("#listRepositories").append($loading);
                            var $search = $("#textSearch").val();
                            $.ajax({
                                url : 'loadRepositories.php',
                                data : { keyword:  $search },
                                type : 'POST',
                                dataType : 'html',
                                success : function(data) {
                                    $("#listRepositories").html(data);
                                    $(".loading-wait").remove();

                                },
                                error : function(jqXHR, status, error) {
                                    alert('Disculpe, existió un problema');
                                },
                                complete : function(jqXHR, status) {
                                }
                            });
                        }
                    );
                });
        </script>
    </head>
    <body>
        
        <div id="frm" class="frm">
            <form name="frmGitHub" method="post">
                <label> Search Keyword </label>
                <input id="textSearch" type="text" name="keyword" />
                <input type="button" id="search" name="submmit" value="Search" />
            </form>
        </div>
        <div class="list" id="listRepositories">
            
        </div>
        <?php
        
        
        
        
       //$repositories = json_decode($repositories);
       //$i = 0; print_r($repositories);
       /*
        * Object ( [type] => repo 
        *          [open_issues] => 4 
        *          [owner] => nathansmith 
        *          [score] => 182.00125 
                * [username] => nathansmith 
                * [description] => The 960 Grid System is an effort to streamline web development workflow. 
                * [has_issues] => 1 
                * [pushed_at] => 2012-02-03T07:08:05-08:00 
                * [forks] => 202 
                * [has_downloads] => 1 
                * [created_at] => 2009-12-19T14:59:29-08:00 
                * [created] => 2009-12-19T14:59:29-08:00 
                * [language] => 
                * [fork] => 
                * [size] => 160 
                * [pushed] => 2012-02-03T07:08:05-08:00 
                * [name] => 960-Grid-System 
                * [watchers] => 2061 
                * [has_wiki] => 1 
                * [private] => 
                * [followers] => 2061 
                * [url] => https://github.com/nathansmith/960-Grid-System 
                * [homepage] => http://960.gs/ )
        */
       //
       //foreach($repositories as $repository => $rs){
           //for($i = 0; $i< count($repositories); $i++){ 
               /*$obj =  $repositories[$i] ;
               foreach($repositories as $ob => $o)
               {   
                   for($i = 0; $i< count($o); $i++)
                   {
                       $o[$i]->type;
                   }
               }
               //print "<br /><br /><br />";
          // }
       / }*/
            
        ?>
    </body>
</html>
