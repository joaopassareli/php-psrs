<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

use League\Plates\Engine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Alura\Mvc\Repository\VideoRepository;
use Psr\Http\Server\RequestHandlerInterface;

class VideoListController implements RequestHandlerInterface
{
    public function __construct(
        private VideoRepository $videoRepository,
        private Engine $templates
        ) {
    }

    public function handle(): ResponseInterface
    {
        $videoList = $this->videoRepository->all();
        return new Response(200, body: $this->templates->render(
            'video-list',
            ['videoList' => $videoList]
        ));
    }
}
