<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Membayasi Route yang di (false)
// Auth::routes([
//     'register' => false,
// ]);


Route::get('/home', 'HomeController@index')->name('home');

// Start Route Management User
    Route::resource('user', 'UserController');
    Route::post('/select-delete-user', 'UserController@select_delete_user')->name('select-delete-user');
    Route::get('user/active/{id}', "UserController@user_active")->name("user.active");
    Route::get('user/not-active/{id}', "UserController@user_not_active")->name("user.not-active");
// End Management User

// Start Route School Identity
    Route::resource('school-identity', 'SchoolIdentityController');
// End Route School Identity

// Start Route semester active
    Route::resource('semester-active', 'SemesterActiveController');
    Route::get('semester-active/active/{id}', "SemesterActiveController@semester_active_active")->name("semester-active.active");
    Route::get('semester-active/not-active/{id}', "SemesterActiveController@semester_active_not_active")->name("semester-active.not-active");
    Route::get('semester-active/delete/{id}',"SemesterActiveController@destroy")->name("semester-active.destroy");

// end Route semester active


// START MASTER DATA
    // Route Mapel
    Route::resource('mapel', 'MasterData\MapelController');
    Route::get('mapel/delete/{id}',"MasterData\MapelController@destroy")->name("mapel.destroy");

    // Route Kelas
    Route::resource('kelas', 'MasterData\KelasController');
    Route::get('kelas/delete/{id}',"MasterData\KelasController@destroy")->name("kelas.destroy");

    // Route Jurusan
    Route::resource('jurusan', 'MasterData\JurusanController');
    Route::get('jurusan/delete/{id}',"MasterData\JurusanController@destroy")->name("jurusan.destroy");

    // Route Ekskul
    Route::resource('ekskul', 'MasterData\EkskulController');
    Route::get('ekskul/delete/{id}',"MasterData\EkskulController@destroy")->name("ekskul.destroy");

     // Route Th Ajaran
    Route::resource('thajaran', 'MasterData\ThAjaranController');
    Route::get('thajaran/delete/{id}',"MasterData\ThAjaranController@destroy")->name("thajaran.destroy");
// END MASTER DATA

// Start Route Management Teacher
    Route::resource('teacher', 'TeacherController');
    Route::post('/select-delete-teacher', 'TeacherController@select_delete_teacher')->name('select-delete-teacher');
    Route::get('teacher/active/{id}', "TeacherController@teacher_active")->name("teacher.active");
    Route::get('teacher/not-active/{id}', "TeacherController@teacher_not_active")->name("teacher.not-active");
// End Route Management Teacher

// Start Route Management Students

    // Management Data Baru
    Route::get('/management-data-baru', 'StudentsController@management_data_baru')->name('management-data-baru');
    Route::get('/management-data-baru-create', 'StudentsController@management_data_baru_create')->name('management-data-baru-create');
    Route::post('/management-data-baru-store', 'StudentsController@management_data_baru_store')->name('management-data-baru-store');

    

    // Management Students Kelas 10
    Route::get('/management-students-kelas-10', 'StudentsController@management_students_kelas_10')->name('management-students-kelas-10');
    Route::get('/management-students-kelas-10-table/{id}', 'StudentsController@management_students_kelas_all')->name('management-students-kelas-10-table');

    Route::get('/management-students-kelas-11', 'StudentsController@management_students_kelas_11')->name('management-students-kelas-11');
    Route::get('/management-students-kelas-11-table/{id}', 'StudentsController@management_students_kelas_all')->name('management-students-kelas-11-table');

    Route::get('/management-students-kelas-12', 'StudentsController@management_students_kelas_12')->name('management-students-kelas-12');
    Route::get('/management-students-kelas-12-table/{id}', 'StudentsController@management_students_kelas_all')->name('management-students-kelas-12-table');
    

    // Download Format, Export, Import File Excel
    Route::get('/download-format-import-students', 'StudentsController@download_format_import_students')->name('download-format-import-students');
    Route::post('/import-students', 'StudentsController@import_students')->name('import-students');
    
    // Route (Edit, Update, Detail, Delete, Active User, Non Active User) Menjadi Satu.
    Route::get('/management-edit-data-students-data-baru/{id}', 'StudentsController@management_edit_data_students_all')->name('management-edit-data-students-data-baru');
    Route::get('/management-edit-data-students-kelas-10/{id}', 'StudentsController@management_edit_data_students_all')->name('management-edit-data-students-kelas-10');
    Route::get('/management-edit-data-students-kelas-11/{id}', 'StudentsController@management_edit_data_students_all')->name('management-edit-data-students-kelas-11');
    Route::get('/management-edit-data-students-kelas-12/{id}', 'StudentsController@management_edit_data_students_all')->name('management-edit-data-students-kelas-12');
    Route::put('/management-edit-data-students-all/{id}', 'StudentsController@management_update_data_students_all')->name('management-edit-data-students-all');

    Route::get('/management-detail-data-students-data-baru/{id}', 'StudentsController@management_detail_data_students_all')->name('management-detail-data-students-data-baru');
    Route::get('/management-detail-data-students-kelas-10/{id}', 'StudentsController@management_detail_data_students_all')->name('management-detail-data-students-kelas-10');
    Route::get('/management-detail-data-students-kelas-11/{id}', 'StudentsController@management_detail_data_students_all')->name('management-detail-data-students-kelas-11');
    Route::get('/management-detail-data-students-kelas-12/{id}', 'StudentsController@management_detail_data_students_all')->name('management-detail-data-students-kelas-12');

    Route::post('/select-delete-data-students', 'StudentsController@select_delete_data_students')->name('select-delete-data-students');
    
    Route::get('management-students-set-active/{id}', "StudentsController@management_students_set_active")->name("management-students-set-active");
    Route::get('management-students-set-notactive/{id}', "StudentsController@management_students_set_notactive")->name("management-students-set-notactive");

    Route::get('/add-check-list-kelas-jurusan', 'StudentsController@add_check_list_kelas_jurusan')->name('add-check-list-kelas-jurusan');
    Route::get('/edit-check-list-kelas-jurusan-kls10/{id}', 'StudentsController@edit_check_list_kelas_jurusan')->name('edit-check-list-kelas-jurusan-kls10');
    Route::get('/edit-check-list-kelas-jurusan-kls11/{id}', 'StudentsController@edit_check_list_kelas_jurusan')->name('edit-check-list-kelas-jurusan-kls11');
    Route::get('/edit-check-list-kelas-jurusan-kls12/{id}', 'StudentsController@edit_check_list_kelas_jurusan')->name('edit-check-list-kelas-jurusan-kls12');

    Route::get('/get-pilih-jurusan', "StudentsController@get_pilih_jurusan");

    Route::post('/check-list-kelas-jurusan-action', 'StudentsController@check_list_kelas_jurusan_action')->name('check-list-kelas-jurusan-action');

    // Search With ajax
    Route::get('/search-ajax-kelas-10', 'StudentsController@search_ajax_all_kelas')->name('search-ajax-kelas-10');
    Route::get('/search-ajax-kelas-11', 'StudentsController@search_ajax_all_kelas')->name('search-ajax-kelas-11');
    Route::get('/search-ajax-kelas-12', 'StudentsController@search_ajax_all_kelas')->name('search-ajax-kelas-12');


// End Route Management Students

// Start Data Kehadiran Siswa

    // KEHADIRAN BULANAN SISWA
    Route::get('/kehadiran-bulanan-kelas-siswa', 'AbsentController@kehadiran_bulanan_kelas_siswa')->name('kehadiran-bulanan-kelas-siswa');
    Route::get('/absent-ajax-search-kelas', 'AbsentController@absent_ajax_search_kelas')->name('absent-ajax-search-kelas');

    Route::get('/kehadiran-bulanan-siswa/{id}', 'AbsentController@kehadiran_bulanan_siswa')->name('kehadiran-bulanan-siswa');

    Route::get('/download-format-excel-kehadiran-bulanan/{id}', 'AbsentController@download_format_excel_kehadiran_bulanan')->name('download-format-excel-kehadiran-bulanan');
    Route::post('/import-kehadiran-bulanan', 'AbsentController@import_kehadiran_bulanan')->name('import-kehadiran-bulanan');
    
    // Search Absent
    Route::get('/buka-absent-siswa', 'AbsentController@buka_absent_siswa')->name('buka-absent-siswa');
    // PDF kehadiran bulanan
    Route::get('/pdf-kehadiran-bulanan-siswa', 'AbsentController@pdf_kehadiran_bulanan_siswa')->name('pdf-kehadiran-bulanan-siswa');
    // Excel kehadiran bulanan
    Route::get('/excel-kehadiran-bulanan-siswa', 'AbsentController@excel_kehadiran_bulanan_siswa')->name('excel-kehadiran-bulanan-siswa');

    // REKAPITULASI ABSENT
    Route::get('/rekapitulasi-absent', 'AbsentController@rekapitulasi_absent')->name('rekapitulasi-absent');
    Route::get('/buka-rekapulasi-absent', 'AbsentController@buka_rekapulasi_absent')->name('buka-rekapulasi-absent');
    // PDF Rekapulasi Absent
    Route::get('/pdf-rekapulasi-absent', 'AbsentController@pdf_rekapulasi_absent')->name('pdf-rekapulasi-absent');
    // Excel Rekapulasi Absent
    Route::get('/excel-rekapulasi-absent', 'AbsentController@excel_rekapulasi_absent')->name('excel-rekapulasi-absent');

// End Data Kehadiran Siswa

