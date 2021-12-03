<?php
//db connection included
require 'functions/dbconn.php';

$errors = array();
$success = array();

if (isset ($_POST['btnupdate'])){
  $blog_title = $_POST['blog_title'];
  $id = $_POST['edit_id'];
  $author = $_POST['author'];
  $description = $_POST['description'];
  $postingdate = date("Y-m-d H:i:s", time());

  if($description === "") {
        $errors['description'] = "blog description is required";
  }else{

  $sql = 'UPDATE tblblog SET blog_title=:blog, author=:author,  blog_description=:description, PostingDate=:postingdate WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':blog' => $blog_title, ':author' => $author, ':description' => $description, ':postingdate' => $postingdate, ':id' => $id])) {
    $success['data'] = "blog has been updated successfully <a href='manage-blog.php'>Go Back</a>";
  }else{
    $errors['data'] = 'Ooops, an error occured';
  }
}
}
?>

<?php
    //All header tag to be included
    include('include/header.php');
?>

<?php
    //sidebar tag to be included
    include('include/sidebar.php');
?>


<main>
    <div class="container-fluid">
        <h1 class="mt-4">blog</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit blog Page</li>
        </ol>
         <?php if (count($errors) > 0): ?>
            <div class="alert alert-danger">
                <?php foreach($errors as $error): ?> 
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (count($success) > 0): ?>
            <div class="alert alert-success">
              <?php foreach($success as $succes): ?> 
                <li class=""><?php echo $succes; ?></li>
              <?php endforeach; ?>
            </div>
        <?php endif; ?>

      <div class="col-md-12">
           <div class="card-body">
                <?php
                if(isset($_POST['btn_edit'])) {
                  $id = $_POST['edit_id'];
                   
                  $sql = 'SELECT * FROM tblblog WHERE id=:id';
                  $statement = $connection->prepare($sql);
                  $statement->execute([':id' => $id ]);
                  $blog = $statement->fetchAll(PDO::FETCH_OBJ);

                  
                  foreach ($blog as $post) {
                    ?>
            
                   <form action="edit-blog.php" method="post">
                    <input type="hidden" name="edit_id" value="<?= $post->id; ?>">

                  <div class="form-group">
                      <label class="col-md-2 control-label">Blog title</label>
                      <div class="col-md-10">
                          <input type="text" class="form-control" value="<?= $post->blog_title; ?>" name="blog_title" required>
                      </div>
                  </div>

                   <div class="form-group">
                      <label class="col-md-2 control-label">Author Name</label>
                      <div class="col-md-10">
                          <input type="text" class="form-control" value="<?= $post->author; ?>" name="author" required>
                      </div>
                  </div>
                   
                <div class="form-group">
                    <label class="col-md-4 control-label">blog Description</label>
                    <div class="col-md-10">
                        <textarea class="form-control" rows="5" name="description" id="description" required><?= $post->blog_description; ?></textarea>
                    </div>
                </div>
                   
                    
                    <a href="manage-blog.php" class="btn btn-danger">Cancel</a>
                    <button type="submit" name="btnupdate" class="btn btn-primary">Update</button>
                    
                   </form>
                   <?php
			    }
				}
				?>

      </div>
        </div>
    </div>
</main>
            
<?php
    //footer tag to be included
    include('include/footer.php');
?>

<?php
    //javascripts files to be included
    include('include/scripts.php');
?>

<script>
$("#description").summernote({
  placeholder: 'Enter blog Descriptions here...',
        height: 100,
         callbacks: {
        onImageUpload : function(files, editor, welEditable) {
 
             for(var i = files.length - 1; i >= 0; i--) {
                     sendFile(files[i], this);
            }
        }
    }
    });

function sendFile(file, el) {
var form_data = new FormData();
form_data.append('file', file);
$.ajax({
    data: form_data,
    type: "POST",
    url: 'include/editor-upload.php',
    cache: false,
    contentType: false,
    processData: false,
    success: function(url) {
        $(el).summernote('editor.insertImage', url);
    }
});
}
</script>