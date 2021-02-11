  </div>
  </div>
  </div>

  <!-- Menu Toggle Script -->
  <script src="<?= base_url('assets/js/jquery.js') ?>"></script>

  <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
  <!-- Js Datatables -->
  <script src="<?= base_url('assets/libs/datatables/datatables.min.js') ?>"></script>

  <!-- Js CkEditor -->
  <script src="<?= base_url('assets/libs/vendor/ckeditor/ckeditor.js') ?>"></script>

  <!-- Js Sweetalert2 -->
  <script src="<?= base_url('assets/sweetalert2/js/sweetalert2.min.js') ?>"></script>

  <script>
    $(document).on('click', '#btn_hps', function(e) {
      e.preventDefault();
      var link = $(this).attr('href');

      Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: "Data akan DiHapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Jangan'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = link;
        }
      })
    });

    var flash = $('#flash').data('flash');
    if (flash) {
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: flash
      });
    }
  </script>



  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

  </body>

  </html>