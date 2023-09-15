<?php
  $siswa11rpl2 = [
    [ "nama" => "Air",
      "absen" => "1"],
    [ "nama" => "Api",
      "absen" => "2"],
    [ "nama" => "Tanah",
      "absen" => "3"],
  ];
?>

<table border="1" cellspacing="0" cellpadding="10">
  <th> Nama </th>
  <th> Aksi </th>

  <?php foreach ($siswa11rpl2 as $nama) : ?>
    <tr>
      <td>
        <a href="glovalvariable/varget.php?
        nama=<?=$nama['nama'] ?>
        absen=<?=$nama['absen'] ?>">
          <button> Detail </button>
        </a>
      </td>
    </tr>
  <?php endforeach ?>
</table>
