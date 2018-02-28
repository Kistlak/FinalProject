<html>
<head>

</head>

<style>

.list-group-item
{
	padding-left:50px;
	
}

a.list-group-item
{
	color: black;
}

</style>

<body>

                <div class="row">

                    <div class="left-cont col-md-3"><!-- Left Container -->
                      <ul class="list-group">
                        
                          <a href="{{ route('AdminPanel') }}" class="list-group-item">Manage Admins</a>
                          <a href="{{ route('MoviePosters') }}" class="list-group-item">Manage Movies</a>
                            <a href="{{ route('CustomizeWeb') }}" class="list-group-item">Customize Web Site</a>
                            <a href="AdminView.php" class="list-group-item">Manage Admins</a>
                            <a href="AdminNew.php" class="list-group-item">Create Admins</a>
                            <a href="ArticlePost.php" class="list-group-item">Post Articles</a>
                            <a href="ArticleView.php" class="list-group-item">Manage Articles</a>
                            <a href="ImgUploads.php" class="list-group-item">Image Uploads</a>
                            <a href="RSV.php" class="list-group-item">RSV</a>
                            <a href="RegShort.php" class="list-group-item">Registor Short</a>
			    <a href="#" class="list-group-item disabled">Test</a>
                       </ul>
                    </div>

</body>
</html>