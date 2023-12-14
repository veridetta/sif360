
    $(document).ready(function() {
        // Mendefinisikan nomor submenu
        let submenuNumber = 1;
        //set submenuNumber berdasarkan jumlah submenu yang ada
        submenuNumber = $('.submenu').length + 1;
        // Fungsi untuk menambahkan submenu
        $('#tambah_sub_menu').on('click', function(e) {
            e.preventDefault();

            // Menambahkan elemen input untuk submenu
            $('#subMenuContainer').append(`
                <div class="submenu mb-3">
                    <label for="submenu_${submenuNumber}" class="form-label">Submenu ${submenuNumber}</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="submenu_${submenuNumber}" name="submenu[]">
                    </div>
                    <div class="mb-3">
                        <label for="submenu_${submenuNumber}" class="form-label">Url Tujuan ${submenuNumber}</label>
                        <div class="input-group">
                            <input type="text" id="submenu_${submenuNumber}" class="form-control" name="submenu_url[]" required>
                            <button class="btn btn-danger hapus-submenu">Hapus Submenu</button>
                        </div>
                    </div>
                </div>
            `);

            submenuNumber++;
        });

        // Fungsi untuk menghapus submenu
        $(document).on('click', '.hapus-submenu', function(e) {
            e.preventDefault();
            $(this).parent().parent().parent('.submenu').remove();
            submenuNumber--;
            var deletedSubmenu = $('#deletedSubmenu');
            //cek ada tidak div dengan id deletedSubmenu
            if(deletedSubmenu.length){
                //ambil id dari button ini atttri idsubmenu
                var idsubmenu = $(this).attr('idsubmenu');
                //tambahkan value idsubmenu ke input hidden
                deletedSubmenu.append('<input type="hidden" name="deleted_submenu[]" value="'+idsubmenu+'">');
            }
        });
    });