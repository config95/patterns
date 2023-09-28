<?php

/**
 * Паттерн цепочка обязанности.
 * Применяется для обработки одного объекта разными обработчиками.
 */

namespace App\Patterns;
interface Handler
{
    public function handle($request): string;

    public function link(Handler $handler): Handler;
}

abstract class RequestHandler implements Handler
{
    protected Handler $next;

    public function link(Handler $handler): Handler
    {
        $this->next = $handler;
        return $this->next;
    }
}


class GetRequestHandler extends RequestHandler
{
    public function handle($request): string
    {
        if ($request->method === 'GET') {
            return 'Обработано';
        }

        return $this->next->handle($request);
    }
}

class PutRequestHandler extends RequestHandler
{
    public function handle($request): string
    {
        if ($request->method === 'PUT') {
            return 'Обработано';
        }

        return $this->next->handle($request);
    }
}


class DeleteRequestHandler extends RequestHandler
{
    public function handle($request): string
    {
        if ($request->method === 'DELETE') {
            return 'Обработано';
        }

        return $this->next->handle($request);
    }
}


class PostRequestHandler extends RequestHandler
{
    public function handle($request): string
    {
        if ($request->method === 'POST') {
            return 'Обработано';
        }

        return $this->next->handle($request);
    }
}


class NoRequestHandler extends \RequestHandler
{
    public function handle($request): string
    {
        return 'Нету обработчика для метода' . $request->method;
    }
}


$chain = new GetRequestHandler();
$chain
    ->link(new PutRequestHandler())
    ->link(new PostRequestHandler())
    ->link(new DeleteRequestHandler())
    ->link(new NoRequestHandler());

$requests = [
    (object)[
        'method' => 'GET'
    ],
    (object)[
        'method' => 'POST'
    ],
    (object)[
        'method' => 'DELETE'
    ],
    (object)[
        'method' => 'DELETE'
    ],
    (object)[
        'method' => '123'
    ],
];

foreach ($requests as $request) {
    echo $chain->handle($request);
}