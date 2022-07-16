<script>
    <?php if ($this->session->flashdata('success')) { ?>
        toastbal.success("<?= $this->session->flashdata('success') ?>")
    <?php } else if ($this->session->flashdata('error')) { ?>
        toastbal.error("<?= $this->session->flashdata('error') ?>")
    <?php } ?>
</script>