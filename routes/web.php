<?php

use Illuminate\Support\Facades\Route;


Route::get('/','UserLoginController@index')->name('login.index');
Route::post('userLogin','UserLoginController@postLogin')->name('user.postlogin');
Route::get('logout','UserLoginController@logout')->name('login.logout');

Route::group(['middleware' => ['auth']], function () {

        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/penempatan', 'AuditController@penempatan')->name('penempatan.print');
        Route::get('/dokumen-audit/instrument-ami/{id_audit}', 'AuditInstrumentController@lihatReport')->name('report.lihat');
        Route::get('/audit-prodi/temuan-audit/print/{id_audit}', 'AuditFindingController@printFinding')->name('finding.print');
        Route::get('/profile', 'UserController@profile')->name('user.profile');
        Route::get('change-password', 'HomeController@changePassword')->name('view.changePassword');
        Route::post('change-password', 'HomeController@store')->name('change.password');
        Route::get('/viewChart', 'PrintChartController@preview')->name('view.chart');
        Route::post('/print_chart',[
            'uses'=>'PrintChartController@print'
        ]);


    Route::group(['middleware' => ['checkrole:Admin']], function () {


        Route::get('/instrument', 'AuditInstrumentController@index')->name('instrument.index');
        Route::get('/standard/{id_instrument}', 'StandardController@detailInstrument')->name('instrument.detail');
        Route::get('standard_component/{id_standard}', 'StandardComponentController@detailStandard')->name('standard.detail');
        Route::get('question/{id_standard_component}', 'QuestionController@detailComponent')->name('question.detail');
        Route::get('score_detail/{id_question}', 'ScoreDetailController@detailComponent')->name('score_detail.detail');
        Route::get('/faculties', 'FacultyController@index')->name('faculty.index');
        Route::get('/department/{id_faculty}', 'DepartmentController@detailFaculty')->name('faculty.department');
        Route::get('/periode', 'PeriodeController@index')->name('periode.index');
        Route::get('/user', 'UserController@index')->name('user.index');
        Route::get('/tambah-user', 'UserController@adduser')->name('user.add');
        Route::get('/dosen', 'LecturerController@index')->name('lecturer.index');
        Route::get('/tambah-dosen', 'LecturerController@addlecturer')->name('lecturer.add');
        Route::get('/dekan', 'DeanController@index')->name('dean.index');
        Route::get('/kajur', 'AuditeeController@index')->name('auditee.index');
        Route::get('/auditor', 'AuditorController@index')->name('auditor.index');
        Route::get('/auditor/ChangeStatus/{id_auditor}', 'AuditorController@changeStatus')->name('auditor.change');
        Route::get('/prodi-audit', 'AuditController@index')->name('audit.index');
        Route::get('/prodi-auditor', 'DepartmentAuditController@index')->name('departmentAudit.index');
        Route::get('/admin/dokumen-audit', 'AuditController@dokumenAdmin')->name('dokumenAdmin.audit');
        Route::get('/admin/dokumen-audit/instrument-ami/{id_audit}', 'AuditInstrumentController@lihatReport')->name('adminDokumen.ami');
        Route::get('/admin/permintaan-tindakan-koreksi/print/{id_audit}', 'CorrectionFormController@printPTK')->name('ptkadmin.print');


        Route::post('/standard/{id_instrument}', 'StandardController@store')->name('standard.post');
        Route::post('/standard_component/{id_standard}', 'StandardComponentController@store')->name('component.post');
        Route::post('/question/{id_standard_component}', 'QuestionController@store')->name('question.post');
        Route::post('/score_detail/{id_question}', 'ScoreDetailController@store')->name('detail.post');
        Route::post('/faculties', 'FacultyController@store')->name('faculty.post');
        Route::post('/department/{id_faculty}', 'DepartmentController@store')->name('prodi.post');
        Route::post('/periode', 'PeriodeController@store')->name('periode.post');
        Route::post('/user', 'UserController@store')->name('user.post');
        Route::post('/dosen', 'LecturerController@store')->name('lecturer.post');
        Route::post('/kajur', 'AuditeeController@store')->name('auditee.post');
        Route::post('/instrument/{id_book}', 'AuditInstrumentController@store')->name('instrumentStandard.post');
        Route::post('/dekan', 'DeanController@store')->name('dean.post');
        Route::post('/auditor', 'AuditorController@store')->name('auditor.post');
        Route::post('/prodi-audit', 'AuditController@store')->name('audit.post');
        Route::post('/prodi-auditor', 'DepartmentAuditController@store')->name('departmentAudit.post');
        Route::post('/instrument', 'AuditInstrumentController@store')->name('instrument.post');

        Route::delete('/standard/{id_standard}', 'StandardController@destroy')->name('standard.destroy');
        Route::delete('/question/{id_question}', 'QuestionController@destroy')->name('question.destroy');
        Route::delete('/standard_component/{id_standard_component}', 'StandardComponentController@destroy')->name('component.destroy');
        Route::delete('/faculties/{id_faculty}', 'FacultyController@destroy')->name('faculty.destroy');
        Route::delete('/department/{id_departement}', 'DepartmentController@destroy')->name('department.destroy');
        Route::delete('/periode/{id_periode}', 'PeriodeController@destroy')->name('periode.destroy');
        Route::delete('/auditor/{id_auditor}', 'AuditorController@destroy')->name('auditor.destroy');
        Route::delete('/user/{id}', 'UserController@destroy')->name('user.destroy');
        Route::delete('/dosen/{id_lecturer}', 'LecturerController@destroy')->name('lecturer.destroy');
        Route::delete('/dekan/{id_dean}', 'DeanController@destroy')->name('dean.destroy');
        Route::delete('/kajur/{id_auditee}', 'AuditeeController@destroy')->name('auditee.destroy');
        Route::delete('/prodi-audit/{id_audit}', 'AuditController@destroy')->name('audit.destroy');
        Route::delete('/prodi-auditor/{id_department_audit}', 'DepartmentAuditController@destroy')->name('departmentAudit.destroy');
        Route::delete('/instrument/{id}', 'AuditInstrumentController@destroy')->name('instrument.destroy');
        Route::delete('/audit_book/{id_standard}', 'BookController@destroy')->name('book.destroy');
        Route::delete('score_detail/{id_score_detail}', 'ScoreDetailController@destroy')->name('detail.destroy');

        Route::patch('/standard/{id_instrument}', 'StandardController@update')->name('standard.edit');
        Route::patch('/instrument', 'AuditInstrumentController@update')->name('instrument.edit');
        Route::patch('/standard_component/{id_standard}', 'StandardComponentController@update')->name('component.edit');
        Route::patch('/user', 'UserController@update')->name('user.edit');
        Route::patch('/dosen', 'LecturerController@update')->name('lecturer.edit');
        Route::patch('/question/{id_standard_component}', 'QuestionController@update')->name('question.edit');
        Route::patch('/faculties', 'FacultyController@update')->name('faculty.edit');
        Route::patch('/department/{id_faculty}', 'DepartmentController@update')->name('prodi.edit');
        Route::patch('/score_detail/{id_question}', 'ScoreDetailController@update')->name('detail.edit');
        Route::patch('/prodi-auditor', 'DepartmentAuditController@update')->name('departmentAudit.edit');
        Route::patch('/dekan', 'DeanController@update')->name('dean.edit');
        Route::patch('/periode', 'PeriodeController@update')->name('periode.edit');


});

    Route::group(['middleware' => ['checkrole:Auditor']], function () {

        Route::get('/auditor/audit-prodi', 'AuditController@prodiAudit')->name('prodi.audit');
        Route::get('/auditor/audit-prodi/{id_audit}', 'AuditFindingController@detailFinding')->name('finding.detail');
        Route::get('/auditor/PTK/keadaan-menyimpang/{id_audit}', 'CorrectionFormController@auditorDevience')->name('auditor.devience');
        Route::get('/auditor/PTK/{id_audit}', 'CorrectionFormController@viewPTK')->name('auditor.ptk');
        Route::get('/auditor/dokumen-audit', 'AuditController@dokumenAudit')->name('dokumen.audit');
        Route::get('/dokumen-audit/instrument-ami/print/{id_audit}', 'AuditInstrumentController@printReport')->name('report.print');
        Route::get('/auditor/permintaan-tindakan-koreksi/print/{id_audit}', 'CorrectionFormController@printPTK')->name('ptkauditor.print');
        Route::get('/standard-audit/{id_audit}', 'StandardController@auditorScore')->name('auditorInstrument.detail');
        Route::get('/skor_audit/{id_audit}', 'AuditScoreController@indexAuditor')->name('skoraudit.view');
        Route::get('/skor_audit/get_data/{id_audit}/','AuditScoreController@get_score')->name('skoraudit.get_data');

        Route::post('/temuan-audit/{id_audit}', 'AuditFindingController@store')->name('finding.post');
        Route::post('/auditor/PTK/keadaan-menyimpang/{id_audit}', 'CorrectionFormController@store')->name('devience.post');
        Route::post('/skor_audit/{id_audit}/{id_question}', 'AuditScoreController@scoreAuditor')->name('skorAuditor.add');

        Route::delete('/temuan-audit/{id_audit_finding}', 'AuditFindingController@destroy')->name('finding.destroy');
        Route::delete('/auditor/PTK/keadaan-menyimpang/{id_correction_form}', 'CorrectionFormController@destroy')->name('devience.destroy');

});

    Route::group(['middleware' => ['checkrole:Auditee']], function () {

        Route::get('/audit-prodi', 'AuditController@lihatAuditProdi')->name('lihatTemuan.audit');
        Route::get('audit-prodi/temuan-audit/{id_audit}', 'AuditFindingController@index')->name('finding.lihat');
        Route::get('/PTK/keadaan-menyimpang/{id_audit}', 'CorrectionFormController@auditeeDevience')->name('auditee.devience');
        Route::get('/PTK/permintaan-tindakan-koreksi/print/{id_audit}', 'CorrectionFormController@printPTK')->name('ptk.print');
        Route::get('/skor_taksiran/{id_audit}', 'AuditScoreController@indexAuditee')->name('skortaksiran.view');
        Route::get('/skor_taksiran/get_data/{id_audit}/','AuditScoreController@get_score')->name('skortaksiran.get_data');
        Route::get('/berita_acara/{id_audit}', 'AuditController@beritaAcara')->name('beritaAcara.audit');
        Route::get('/auditee/dokumen-audit', 'AuditController@dokumenAuditee')->name('dokumen.auditee');

        Route::post('/skor_taksiran/{id_audit}/{id_question}', 'AuditScoreController@store')->name('auditeeScore.post');

        Route::patch('/PTK/keadaan-menyimpang/{id_audit}', 'CorrectionFormController@update')->name('ptk.edit');

});
});
