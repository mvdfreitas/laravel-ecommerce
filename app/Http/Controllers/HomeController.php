<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsLetterEmailRequest;
use App\Interfaces\NewsLetterEmailRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $newsLetterEmailRepository;

    public function __construct(NewsLetterEmailRepositoryInterface $newsLetterEmailRepository)
    {
        $this->newsLetterEmailRepository = $newsLetterEmailRepository;
    }


    public function index()
    {
        return view('site.index');
    }

    public function newsLetterEmail(NewsLetterEmailRequest $request)
    {
        try{
            $this->newsLetterEmailRepository->createOrUpdate($request);
            return redirect()
                    ->back()
                    ->with('success', 'E-mail cadastradado! Agora você vai receber promoções no seu e-mail! Fique atento as novidades!')
                    ->withFragment('news-letter');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Opps! Tivemos um erro, tente novamente mais tarde.')->withInput();
        }
    }
}
