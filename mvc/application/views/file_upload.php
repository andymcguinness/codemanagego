<?php echo $error;?>

<div class="full-width-wrapper large-12 small-12 columns file-upload">
    <h3 class="page-header"><i class="icon-upload"></i> Upload a File</h3>

    <?php echo form_open_multipart('files/do_upload');?>
    <div class="row sub-content-wrapper">
        <p>Select the file you want to upload:</p>
        <input type="file" name="userfile" />
    </div>

    <div class="row sub-content-wrapper">
        <button type="submit">Upload</button>
    </div>
    </form>
</div>