<?php

namespace App\Http\Controllers;

use App\ButtonColor;
use App\ButtonConfiguration;
use App\Http\Repositories\ButtonConfigurationRepository;
use \App\Http\Resources\ButtonColor as ButtonColorResource;
use App\Http\Resources\ButtonConfig as ButtonConfigResource;
use Illuminate\Http\Request;

class WebDashboardController extends Controller
{

    /**
     * Display dashboard
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $buttonConfigurations = ButtonConfiguration::with('colors')->get();

        return view('grid')->with('buttonConfigurations',$buttonConfigurations);
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
            throw new \Exception("Failed to store configurations");
        }

    }

    public function update(Request $request, $id, ButtonConfigurationRepository $buttonConfigurationRepository)
    {
        try {
            $config = $buttonConfigurationRepository->update($request,$id);
            return new ButtonConfigResource($config);
        } catch (\Exception $exception) {
            throw new \Exception("Failed to update configurations");
        }
    }

    public function deleteConfiguration(Request $request, $id,  ButtonConfigurationRepository $buttonConfigurationRepository)
    {
        try {
            $config = $buttonConfigurationRepository->destroy($id);
            return response()->json(['success' => ['message' => "link deleted successfully", 'config' => $config]]);
        } catch (\Exception $exception) {
            throw new \Exception("Failed to delete configurations");
        }
    }

    public function editForm($id)
    {
        $buttonConfigurations =  ButtonConfiguration::with('colors')->findOrFail($id);
        $colors = ButtonColor::all();
        $colorId = $buttonConfigurations->colors->id;
        $colorName = $buttonConfigurations->colors->color;
        $allColors = $colors->where('color', '!=', $colorName)->pluck('color', 'id');
        return view('edit_form')->with(['buttonConfigurations' => $buttonConfigurations, 'allColors'=> $allColors, 'colorName' => $colorName, 'colorId'=> $colorId]);
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
     * Get Colors
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getColors() {

        $buttonColors = ButtonColor::all();

        return ButtonColorResource::collection($buttonColors);
    }
}
