<!--  
NAMA - NIM : NUANSA BENING AURA JELITA - 2301410
Filename : anime_list.php
Deskripsi: File utama sistem yang mengatur routing berdasarkan parameter URL, 
            menghubungkan ViewModel dengan view untuk menangani operasi CRUD pada entitas ulasan, penonton, dan anime.
-->

<?php
require_once 'viewmodel/PenontonViewModel.php';
require_once 'viewmodel/AnimeViewModel.php';
require_once 'viewmodel/UlasanViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'penonton';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($entity == 'penonton') {
    $viewModel = new PenontonViewModel();
    if ($action == 'list') {
        $penontonList = $viewModel->getPenontonList();
        require_once 'views/penonton_list.php';
    } elseif ($action == 'add') {
        require_once 'views/penonton_form.php';
    } elseif ($action == 'edit') {
        $penonton = $viewModel->getPenontonById($_GET['id']);
        require_once 'views/penonton_form.php';
    } elseif ($action == 'save') {
        $viewModel->addPenonton($_POST['nama'], $_POST['email'], $_POST['telepon']);
        header('Location: index.php?entity=penonton');
    } elseif ($action == 'update') {
        $viewModel->updatePenonton($_GET['id'], $_POST['nama'], $_POST['email'], $_POST['telepon']);
        header('Location: index.php?entity=penonton');
    } elseif ($action == 'delete') {
        $viewModel->deletePenonton($_GET['id']);
        header('Location: index.php?entity=penonton');
    }
} elseif ($entity == 'anime') {
    $viewModel = new AnimeViewModel();
    if ($action == 'list') {
        $animeList = $viewModel->getAnimeList();
        require_once 'views/anime_list.php';
    } elseif ($action == 'add') {
        require_once 'views/anime_form.php';
    } elseif ($action == 'edit') {
        $anime = $viewModel->getAnimeById($_GET['id']);
        require_once 'views/anime_form.php';
    } elseif ($action == 'save') {
        $viewModel->addAnime($_POST['nama_anime'], $_POST['genre'], $_POST['tahun_rilis'], $_POST['status']);
        header('Location: index.php?entity=anime');
    } elseif ($action == 'update') {
        $viewModel->updateAnime($_GET['id'], $_POST['nama_anime'], $_POST['genre'], $_POST['tahun_rilis'], $_POST['status']);
        header('Location: index.php?entity=anime');
    } elseif ($action == 'delete') {
        $viewModel->deleteAnime($_GET['id']);
        header('Location: index.php?entity=anime');
    }
} elseif ($entity == 'ulasan') {
    $viewModel = new UlasanViewModel();
    if ($action == 'list') {
        $ulasanList = $viewModel->getUlasanList();
        require_once 'views/ulasan_list.php';
    } elseif ($action == 'add') {
        $penonton = $viewModel->getPenonton();
        $anime = $viewModel->getAnime();
        require_once 'views/ulasan_form.php';
    } elseif ($action == 'edit') {
        $ulasan = $viewModel->getUlasanById($_GET['id']);
        $penonton = $viewModel->getPenonton();
        $anime = $viewModel->getAnime();
        require_once 'views/ulasan_form.php';
    } elseif ($action == 'save') {
        $viewModel->addUlasan($_POST['id_penonton'], $_POST['id_anime'], $_POST['komentar'], $_POST['rating']);
        header('Location: index.php?entity=ulasan');
    } elseif ($action == 'update') {
        $viewModel->updateUlasan($_GET['id'], $_POST['id_penonton'], $_POST['id_anime'], $_POST['komentar'], $_POST['rating']);
        header('Location: index.php?entity=ulasan');
    } elseif ($action == 'delete') {
        $viewModel->deleteUlasan($_GET['id']);
        header('Location: index.php?entity=ulasan');
    }
}
?>