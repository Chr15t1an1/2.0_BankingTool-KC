<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


use Illuminate\Support\Facades\Storage;

use Illuminate\Http\UploadedFile;


use Laravel\Dusk\DuskServiceProvider;




class UploadViewTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_homepageView()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
	
	
	public function test_homepageForm()
    {
		$pathToFile = public_path().'testcase/test-banking-report.xls';
        $this->visit('/')
		 	  ->attach($pathToFile, 'fileUpload')
			  ->press('upload')
         	  ->seePageIs('/export-list');
		//Storage::fake('fileUpload');
        //$response = $this->json('POST', '/upload', ['fileUpload' => UploadedFile::fake()->create('document.xls', '10')]);	
		# $response = $this->call('POST', '/upload', ['fileUpload' =>$pathToFile]);
		#$response->assertSuccessful();
		//$response->assertStatus(200);
		//Storage::fake('fileUpload');
//        $response = $this->json('POST', '/upload', ['fileUpload' => UploadedFile::fake()->create('document.xls', '10')]);
		//$response->assertSuccessful();
	/*	
	 $this->visit('/')
         ->attach($pathToFile, 'fileUpload')
         ->press('upload')
         ->see('You are logged in!');
	*/
	
	
	
	
	
	
	}

	
	
	
	
	
}
