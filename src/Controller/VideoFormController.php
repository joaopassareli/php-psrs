<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

use League\Plates\Engine;
use Nyholm\Psr7\Response;
use Alura\Mvc\Entity\Video;
use Psr\Http\Message\ResponseInterface;
use Alura\Mvc\Repository\VideoRepository;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class VideoFormController implements RequestHandlerInterface
{        
    public function __construct(
        private VideoRepository $repository,
        private Engine $templates
    ) {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $queryParams = $request->getQueryParams();
        $id = filter_var($queryParams['id'] ?? '', FILTER_VALIDATE_INT);
        /** @var ?Video $video */
        $video = null;
        if ($id !== false && $id !== null) {
            $video = $this->repository->find($id);
        }

        return new Response(200, body: $this->templates->render('video-form', [
            'id' => $id,
            'video' => $video
        ]));
    }
}
