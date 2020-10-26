<?php

use Illuminate\Support\Facades\Route;


// Auth::routes();


Route::get('/','UserLoginController@index')->name('login.index');
Route::post('userLogin','UserLoginController@postLogin')->name('user.postlogin');
Route::get('logout','UserLoginController@logout')->name('login.logout');

Route::group(['middleware' => ['auth']], function () {

        Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['middleware' => ['checkrole:Admin']], function () {

        Route::get('/standard', 'StandardController@index')->name('standard.index');
        Route::get('/instrument', 'AuditInstrumentController@index')->name('instrument.index');
        Route::get('standard_component/{id_standard}', 'StandardComponentController@detailStandard')->name('standard.detail');
        Route::get('question/{id_standard_component}', 'QuestionController@detailComponent')->name('question.detail');
        Route::get('score_detail/{id_question}', 'ScoreDetailController@detailComponent')->name('score_detail.detail');
        Route::get('/faculties', 'FacultyController@index')->name('faculty.index');
        Route::get('/department/{id_faculty}', 'DepartmentController@detailFaculty')->name('faculty.department');
        Route::get('/periode', 'PeriodeController@index')->name('periode.index');
        Route::get('/user', 'UserController@index')->name('user.index');
        Route::get('/tambah-user', 'UserController@adduser')->name('user.add');
        Route::get('/tambah-periode-standar', 'AuditInstrumentController@addPs')->name('periodeStandard.add');
        Route::get('/dosen', 'LecturerController@index')->name('lecturer.index');
        Route::get('/tambah-dosen', 'LecturerController@addlecturer')->name('lecturer.add');
        Route::get('/dekan', 'DeanController@index')->name('dean.index');
        Route::get('/tambah-dekan', 'DeanController@addDean')->name('dean.add');
        Route::get('/kajur', 'AuditeeController@index')->name('auditee.index');
        Route::get('/tambah-kajur', 'AuditeeController@addAuditee')->name('auditee.add');
        Route::get('/auditor', 'AuditorController@index')->name('auditor.index');
        Route::get('/tambah-auditor', 'AuditorController@addAuditor')->name('auditor.add');
        Route::get('auditorChangeStatus', 'AuditorController@changeStatus')->name('auditor.change');
        Route::get('/prodi-audit', 'AuditController@index')->name('audit.index');
        Route::get('/tambah-prodi-periode', 'AuditController@addAudit')->name('audit.add');
        Route::get('/prodi-auditor', 'DepartmentAuditController@index')->name('departmentAudit.index');
        Route::get('/tambah-prodi-auditor', 'DepartmentAuditController@addDepartmentAudit')->name('departmentAudit.add');

        Route::post('/standard', 'StandardController@store')->name('standard.post');
        Route::post('/standard_component/{id_standard}', 'StandardComponentController@store')->name('component.post');
        Route::post('/question/{id_standard_component}', 'QuestionController@store')->name('question.post');
        Route::post('/faculties', 'FacultyController@store')->name('faculty.post');
        Route::post('/department/{id_faculty}', 'DepartmentController@store')->name('prodi.post');
        Route::post('/periode', 'PeriodeController@store')->name('periode.post');
        Route::post('/user', 'UserController@store')->name('user.post');
        Route::post('/dosen', 'LecturerController@store')->name('lecturer.post');
        Route::post('/kajur', 'AuditeeController@store')->name('auditee.post');
        Route::post('/instrument', 'AuditInstrumentController@store')->name('periodeStandard.post');
        Route::post('/dekan', 'DeanController@store')->name('dean.post');
        Route::post('/auditor', 'AuditorController@store')->name('auditor.post');
        Route::post('/prodi-audit', 'AuditController@store')->name('audit.post');
        Route::post('/prodi-auditor', 'DepartmentAuditController@store')->name('departmentAudit.post');

        Route::delete('/standard/{id_standard}', 'StandardController@destroy')->name('standard.destroy');
        Route::delete('/question/{id_question}', 'QuestionController@destroy')->name('question.destroy');
        Route::delete('/standard_component/{id_standard_component}', 'StandardComponentController@destroy')->name('component.destroy');
        Route::delete('/faculties/{id_faculty}', 'FacultyController@destroy')->name('faculty.destroy');
        Route::delete('/department/{id_dpartement}', 'DepartmentController@destroy')->name('department.destroy');
        Route::delete('/periode/{id_periode}', 'PeriodeController@destroy')->name('periode.destroy');
        Route::delete('/auditor/{id_auditor}', 'AuditorController@destroy')->name('auditor.destroy');
        Route::delete('/user/{id}', 'UserController@destroy')->name('user.destroy');
        Route::delete('/dosen/{id_lecturer}', 'LecturerController@destroy')->name('lecturer.destroy');
        Route::delete('/dekan/{id_dean}', 'DeanController@destroy')->name('dean.destroy');
        Route::delete('/kajur/{id_auditee}', 'AuditeeController@destroy')->name('auditee.destroy');
        Route::delete('/prodi-audit/{id_audit}', 'AuditController@destroy')->name('audit.destroy');
        Route::delete('/prodi-auditor/{id_department_audit}', 'DepartmentAuditController@destroy')->name('departmentAudit.destroy');

        Route::patch('/standard', 'StandardController@update')->name('standard.edit');
        Route::patch('/standard_component/{id_standard}', 'StandardComponentController@update')->name('component.edit');
        // Route::patch('/user/{id}', 'UserController@update')->name('user.edit');
        Route::patch('/question/{id_standard_component}', 'QuestionController@update')->name('question.edit');
        Route::patch('/faculties', 'FacultyController@update')->name('faculty.edit');
        Route::patch('/department/{id_faculty}', 'DepartmentController@update')->name('prodi.edit');
});

    Route::group(['middleware' => ['checkrole:Auditor']], function () {

        Route::get('/auditor/audit-prodi', 'AuditController@prodiAudit')->name('prodi.audit');
        Route::get('/auditor/audit-prodi/{id_audit}', 'AuditFindingController@detailFinding')->name('finding.detail');
        Route::get('/auditor/PTK/keadaan-menyimpang/{id_audit}', 'CorrectionFormController@auditorDevience')->name('auditor.devience');
        Route::get('/auditor/PTK/{id_audit}', 'CorrectionFormController@viewPTK')->name('auditor.ptk');

        Route::get('/standard-audit/{id_audit}', 'StandardController@auditorScore')->name('instrument.detail');
        Route::get('/skor_audit/{id_audit}', 'AuditScoreController@indexAuditor')->name('skoraudit.view');
        Route::get('/skor_audit/get_data/{id_audit}/','AuditScoreController@get_score')->name('skoraudit.get_data');
        Route::post('/temuan-audit/{id_audit}', 'AuditFindingController@store')->name('finding.post');
        Route::post('/auditor/PTK/keadaan-menyimpang/{id_audit}', 'CorrectionFormController@store')->name('devience.post');

        Route::post('/skor_audit/{id_audit}/{id_question}', 'AuditScoreController@scoreAuditor')->name('skorAuditor.add');
});

    Route::group(['middleware' => ['checkrole:Auditee']], function () {

        Route::get('/audit-prodi', 'AuditController@lihatAuditProdi')->name('lihatTemuan.audit');
        Route::get('audit-prodi/temuan-audit/{id_audit}', 'AuditFindingController@index')->name('finding.lihat');
        Route::get('/PTK/keadaan-menyimpang/{id_audit}', 'CorrectionFormController@auditeeDevience')->name('auditee.devience');
        Route::get('/PTK/permintaan-tindakan-koreksi/{id_audit}', 'CorrectionFormController@viewPTK')->name('ptk.view');
        Route::get('/PTK/permintaan-tindakan-koreksi/print/{id_audit}', 'CorrectionFormController@printPTK')->name('ptk.print');
        Route::get('/skor_taksiran/{id_audit}', 'AuditScoreController@indexAuditee')->name('skortaksiran.view');
        Route::get('/skor_taksiran/get_data/{id_audit}/','AuditScoreController@get_score')->name('skortaksiran.get_data');
        Route::get('/berita_acara/{id_department}', 'AuditController@beritaAcara')->name('beritaAcara.audit');

        Route::post('/skor_taksiran/{id_audit}/{id_question}', 'AuditScoreController@store')->name('auditeeScore.post');

        Route::patch('/PTK/keadaan-menyimpang/{id_audit}', 'CorrectionFormController@update')->name('ptk.edit');

});
});