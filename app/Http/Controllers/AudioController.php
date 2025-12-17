<?php

namespace App\Http\Controllers;

use App\Http\Resources\Audios\AudioResource;
use App\Models\Audio;

class AudioController extends Controller
{
    public function getAudios()
    {
        $search = request('keyword', null);

        $audios = Audio::when($search,
            fn($q) => $q->where("title", "like", "%$search%"))
            ->latest()->paginate('9');

        if (!$audios) apiResponse(404, 'audios not found');

        return AudioResource::collection($audios)->response()->getData(true);
    }
}
