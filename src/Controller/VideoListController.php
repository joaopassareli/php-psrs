<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

use Alura\Mvc\Helper\HtmlRendererTrait;
use Alura\Mvc\Repository\VideoRepository;
use Psr\Http\Message\ResponseInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Server\RequestHandlerInterface;

class VideoListController implements RequestHandlerInterface
{

    use HtmlRendererTrait;

    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function handle(): ResponseInterface
    {
        $videoList = $this->videoRepository->all();
        return new Response(200, body: $this->renderTemplate(
            'video-list',
            ['videoList' => $videoList]
        ));
    }
}
