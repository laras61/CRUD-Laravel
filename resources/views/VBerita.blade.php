@extends('Layout')
@section('content')
<a href="#" onclick="ModalTambahBerita()"  class="btn btn-success"> + Add New Data</a>


<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>kd_berita</th>
            <th>nama_berita</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($berita as $Get)
        <tr>
            <td>{{ $Get->kd_berita }}</td>
            <td>{{ $Get->nama_berita }}</td>
            <td>
                <button  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal" data-url="{{ route('berita.update',['id'=>$Get->kd_berita]) }}" data-nama_berita="{{ $Get->nama_berita }}">Update</button>
                |
                <a class="btn btn-danger" href="berita/hapus/{{ $Get->kd_berita }}">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>

<!-- Form Modal Tambah Berita -->
<form action="berita/tambah" method="post">
    @csrf
<div class="modal fade" id="ModalTambahBerita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Form Tambah</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label  class="form-label">Nama Berita</label>
                <input type="text" class="form-control" name="nama_berita" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
        </div>
        </div>
    </div>
</div>
</form>

<script>
    // Modal Tambah Kontak
    function ModalTambahBerita () {
        $('#ModalTambahBerita').modal('show');
    }
    // Modal Tambah Berita
</script>



<!-- Form Modal Tambah Berita -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content">

        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script>
    $('#updateModal').on('shown.bs.modal', function(e) {
        var html = `
            <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="${$(e.relatedTarget).data('url')}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Berita</label>
                <input type="text" name="nama_berita" value="${$(e.relatedTarget).data('nama_berita')}" class="form-control" id="exampleFormControlInput1"
                    placeholder="name@example.com">
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>

`;

        $('#modal-content').html(html);

    });

   </script>

@endsection
