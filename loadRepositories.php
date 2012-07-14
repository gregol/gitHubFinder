<style type="text/css">
    table, td, th
{
border:1px solid green;
}
th
{
background-color:green;
color:white;
}
</style>
<?php
        require_once (__DIR__ . '/libs/curl.php');
        require_once (__DIR__ . '/libs/github.php');
        require_once (__DIR__ . '/libs/chars.php');
        require_once (__DIR__ . '/libs/markdown.php');
        require_once (__DIR__ . '/config/config.php');
    
        $keyword = $_POST["keyword"];
       $git = new Github();
       $repositories = $git->getRepositoryWithKeyword($keyword);
       $repositories = json_decode($repositories);
?>
<table class="tableClass">
    <thead>
        <th>Owner</th>
        <th>description</th>
        <th>url</th>
        <th>language</th>
        <th>pushed</th>
        <th>score</th>
        <th>homepage</th>
    </thead>
    <tbody>
       <?php foreach($repositories as $repositories => $r)
            {
           for($i = 0; $i<count($r);$i++) {  ?> 
        <tr>
            <td><?php print $r[$i]->owner; ?></td>
            <td><?php if(isset($r[$i]->description)) print $r[$i]->description; ?></td>
            <td><?php if(isset($r[$i]->url)) ?> <a href="<?php print  $r[$i]->url; ?>"><?php print  $r[$i]->url; ?></a></td>
            <td><?php print $r[$i]->language; ?></td>
            <td><?php print $r[$i]->pushed; ?></td>
            <td><?php print $r[$i]->score; ?></td>
            <td><?php if(isset($r[$i]->homepage) && !empty($r[$i]->homepage)){ ?> <a href="<?php print  $r[$i]->homepage; ?>"><?php print  $r[$i]->homepage; ?></a><?php } ?></td>
        </tr>
        
       <?php } 
            
            } ?> 
    </tbody>
    
</table>