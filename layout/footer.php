<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- asset plugin datatable untuk perhitungan tabel -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.bootstrap5.js"></script>

<!-- load font awesome -->
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

<!-- load ckeditor -->
<script src="https://cdn.ckeditor.com/4.19.0/full/ckeditor.js"></script>

<script>
    CKEDITOR.replace('alamat', {
        filebrowserBrowseUrl: 'asset/ckfinder/ckfinder.html',
        filebrowserUploadUrl: 'asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        height: '400px',
        removePlugins: 'notification',
        on: {
            instanceReady: function() {
                this.removeNotification(this._.notification.getId());
            }
        }
    });
</script>


<script>
    new DataTable('#example');
</script>
</body>
</html>