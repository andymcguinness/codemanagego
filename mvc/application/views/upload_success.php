<div class="full-width-wrapper large-12 small-12 columns file-upload-success">
    <h3><i class="icon-checkmark"></i> Your file was successfully uploaded!</h3>

    <p><?php echo anchor('upload', 'Upload Another File!'); ?></p>
    <p><a href="<?php echo base_url(); ?>index.php/projects/project/<?php echo $this->session->userdata('pjt_slug'); ?>">Return to your project.</a></p>
</div>