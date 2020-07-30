<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Repositories\RepositoryInterface\ClubInterface;
use App\Repositories\RepositoryInterface\PointInterface;
use App\Repositories\RepositoryInterface\ScoreInterface;
use App\Traits\Match;
use App\Traits\Score;
use Illuminate\Http\Request;

class LeagueController extends BaseController
{

    use Match;
    use Score;

    /**
     * @var
     */
    private $clubRepository;
    private $scoreRepository;
    private $pointRepository;

    /**
     * League constructor.
     * @param ClubInterface $clubRepository
     * @param ScoreInterface $scoreRepository
     * @param PointInterface $pointRepository
     */
    public function __construct(
        ClubInterface $clubRepository,
        ScoreInterface $scoreRepository,
        PointInterface $pointRepository)
    {
        $this->clubRepository = $clubRepository;
        $this->scoreRepository = $scoreRepository;
        $this->pointRepository = $pointRepository;

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $clubs = $this->clubRepository->all();

        $collection = collect($clubs)->shuffle();

        $matches = $collection->split(2);

        return view("welcome", compact('clubs', 'matches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function playMatch(Request $request)
    {

        if ($request->ajax()) {

            $clubs = $this->clubRepository->all();

            $matchesTable = self::getMatch($clubs);

            $matchesTableArr = $matchesTable->toArray();

            $result = $this->scoreRepository->setMatch($matchesTableArr);

            if ($result) {


                $winner = $this->scoreRepository->getPointTable($matchesTableArr[0][0]['season']);


                $seasonResult = $this->scoreRepository->getScore($matchesTableArr[0][0]['season']);

                $this->pointRepository->setPoint($seasonResult->toArray());


            } else {

                return $this->apiResponse(self::ERROR, null, trans('messages.internal_server_error'), self::HTTP_INTERNAL_SERVER_ERROR);
            }


        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
