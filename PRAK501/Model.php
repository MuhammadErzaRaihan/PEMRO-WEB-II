<?php
require_once("Koneksi.php");

//  Member 
function getAllMembers() {
    $conn = getConnection();
    return $conn->query("SELECT * FROM member");
}

function getMemberById($id) {
    $conn = getConnection();
    return $conn->query("SELECT * FROM member WHERE id_member=$id")->fetch_assoc();
}

function insertMember($data) {
    $conn = getConnection();
    $stmt = $conn->prepare("INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $data['nama'], $data['nomor'], $data['alamat'], $data['tgl_daftar'], $data['tgl_bayar']);
    $stmt->execute();
}

function updateMember($id, $data) {
    $conn = getConnection();
    $stmt = $conn->prepare("UPDATE member SET nama_member=?, nomor_member=?, alamat=?, tgl_mendaftar=?, tgl_terakhir_bayar=? WHERE id_member=?");
    $stmt->bind_param("sssssi", $data['nama'], $data['nomor'], $data['alamat'], $data['tgl_daftar'], $data['tgl_bayar'], $id);
    $stmt->execute();
}

function deleteMember($id) {
    $conn = getConnection();
    $conn->query("DELETE FROM member WHERE id_member=$id");
}

//  Buku 
function getAllBooks() {
    $conn = getConnection();
    return $conn->query("SELECT * FROM buku");
}


//  Peminjaman 
function getAllLoans() {
    $conn = getConnection();
    return $conn->query("SELECT * FROM peminjaman");
}




//  Buku 
function getBookById($id) {
    $conn = getConnection();
    return $conn->query("SELECT * FROM buku WHERE id_buku=$id")->fetch_assoc();
}
function insertBook($data) {
    $conn = getConnection();
    $stmt = $conn->prepare("INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $data['judul'], $data['penulis'], $data['penerbit'], $data['tahun']);
    $stmt->execute();
}
function updateBook($id, $data) {
    $conn = getConnection();
    $stmt = $conn->prepare("UPDATE buku SET judul_buku=?, penulis=?, penerbit=?, tahun_terbit=? WHERE id_buku=?");
    $stmt->bind_param("sssii", $data['judul'], $data['penulis'], $data['penerbit'], $data['tahun'], $id);
    $stmt->execute();
}
function deleteBook($id) {
    $conn = getConnection();
    $conn->query("DELETE FROM buku WHERE id_buku=$id");
}

//  Peminjaman 
function getLoanById($id) {
    $conn = getConnection();
    return $conn->query("SELECT * FROM peminjaman WHERE id_peminjaman=$id")->fetch_assoc();
}
function insertLoan($data) {
    $conn = getConnection();
    $stmt = $conn->prepare("INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $data['id_member'], $data['id_buku'], $data['tgl_pinjam'], $data['tgl_kembali']);
    $stmt->execute();
}
function updateLoan($id, $data) {
    $conn = getConnection();
    $stmt = $conn->prepare("UPDATE peminjaman SET id_member=?, id_buku=?, tgl_pinjam=?, tgl_kembali=? WHERE id_peminjaman=?");
    $stmt->bind_param("iissi", $data['id_member'], $data['id_buku'], $data['tgl_pinjam'], $data['tgl_kembali'], $id);
    $stmt->execute();
}
function deleteLoan($id) {
    $conn = getConnection();
    $conn->query("DELETE FROM peminjaman WHERE id_peminjaman=$id");
}

?>
