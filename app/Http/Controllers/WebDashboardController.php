<?php

namespace App\Http\Controllers;

use App\ButtonColor;
use App\ButtonConfiguration;
use App\Http\Repositories\ButtonColorRepository;
use App\Http\Repositories\ButtonConfigurationRepository;
use \App\Http\Resources\ButtonColor as ButtonColorResource;
use App\Http\Resources\ButtonConfig as ButtonConfigResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class WebDashboardController extends Controller
{

    /**
     * Display dashboard
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index()
    {
        try {
            $buttonConfigurations = ButtonConfiguration::with('colors')->get();

            return view('grid')->with('buttonConfigurations',$buttonConfigurations);
        } catch (\Exception $exception) {
            return response()->json(['message' => "Couldn't load button configurations"], 500);
        }

    }

    /**
     * Store button configurations
     *
     * @param Request $request
     * @param ButtonConfigurationRepository $buttonConfigurationRepository
     * @return ButtonConfigResource
     * @throws \Exception
     */
    public function store(Request $request, ButtonConfigurationRepository $buttonConfigurationRepository)
    {
        try {
            $config = $buttonConfigurationRepository->store($request);
            return new ButtonConfigResource($config);
        } catch (\Exception $exception) {
            return response()->json(['message' => 'Failed to store configurations'], 500);
        }

    }

    /**
     * Update button configuration
     *
     * @param Request $request
     * @param $id
     * @param ButtonConfigurationRepository $buttonConfigurationRepository
     * @return ButtonConfigResource|\Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id, ButtonConfigurationRepository $buttonConfigurationRepository)
    {
        try {
            $config = $buttonConfigurationRepository->update($request,$id);
            return new ButtonConfigResource($config);
        } catch (\Exception $exception) {
            return response()->json(['message' => 'Failed to update configurations'], 500);
        }
    }

    /**
     * Delete button configuration
     *
     * @param Request $request
     * @param $id
     * @param ButtonConfigurationRepository $buttonConfigurationRepository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function deleteConfiguration(Request $request, $id,  ButtonConfigurationRepository $buttonConfigurationRepository)
    {
        try {
            $buttonConfigurationRepository->destroy($id);
            return redirect()->route('dashboard');
        } catch (\Exception $exception) {
            return response()->json(['message' => 'Failed to delete configurations'], 500);
        }
    }


    /**
     * Edit button configuration form
     *
     * @param $id
     * @param ButtonColorRepository $buttonColorRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editForm($id, ButtonColorRepository $buttonColorRepository)
    {
        try {
            $buttonConfigurations =  ButtonConfiguration::with('colors')->findOrFail($id);;
            $colorObject = $buttonColorRepository->getColorDetails($buttonConfigurations);

            return view('edit_form')->with(['buttonConfigurations' => $buttonConfigurations, 'allColors'=> $colorObject->allColors, 'colorName' => $colorObject->colorName, 'colorId'=>$colorObject->colorId]);
        } catch (ModelNotFoundException $exception) {
            throw new ModelNotFoundException();
        }

    }

    /**
     * Display form for adding configurations
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addForm()
    {
        return view('form');
    }

    /**
     * Get colors api
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getColors() {

        $buttonColors = ButtonColor::all();

        return ButtonColorResource::collection($buttonColors);
    }
}
