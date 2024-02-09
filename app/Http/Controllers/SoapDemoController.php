<?php

namespace App\Http\Controllers;

use App\Http\Services\ExampleSoap;
use Illuminate\Support\Facades\Response;
use Laminas\Soap\AutoDiscover as WsdlAutoDiscover;
use Laminas\Soap\Server as SoapServer;

class SoapDemoController extends Controller
{
    public function wsdlAction()
    {
        if (!request()->isMethod('get')) {
            return $this->prepareClientErrorResponse('GET');
        }

        $wsdl = new WsdlAutoDiscover();
        $wsdl->setBindingStyle(['style' => 'document']);

        $wsdl->setUri(route('soap-server'))
            ->setServiceName('MySoapService');


        $this->populateServer($wsdl);

        return Response::make($wsdl->toXml())
            ->header('Content-Type', 'application/xml');
    }

    public function serverAction()
    {
        if (!request()->isMethod('post')) {
            return $this->prepareClientErrorResponse('POST');
        }

        $server = new SoapServer(
            route('soap-wsdl'),
            [
                'actor' => route('soap-server'),
            ]
        );

        $server->setReturnResponse(true);
        $this->populateServer($server);
        $soapResponse = $server->handle();

        return Response::make($soapResponse)
            ->header('Content-Type', 'application/xml');
    }

    private function prepareClientErrorResponse(string $allowed)
    {
        return Response::make('Method not allowed', 405)
            ->withHeaders(['Allow' => $allowed]);

    }

    private function populateServer($server)
    {
        // Expose a class and its methods:
        $server->setClass(ExampleSoap::class);

        // Expose a function:
        // $server->addFunction('Acme\Model\ping');
    }
}
