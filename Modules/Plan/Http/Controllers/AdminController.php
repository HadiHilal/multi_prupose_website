<?php

namespace Modules\Plan\Http\Controllers;

use App\Traits\ImgTrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Modules\Plan\Entities\Plan;
use Modules\Plan\Entities\PlanFeature;

class AdminController extends Controller
{
    use ImgTrait;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $index_plans = 'show';
        $plans = Plan::all();
        return view('plan::admin.index' , compact('index_plans' , 'plans'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $index_plans = 'show';
        return view('plan::admin.create' , compact('index_plans'));
    }
    public function store(Request $request)
    {
            $rules = [
              'img' => 'required|image|mimes:jpeg,png,jpg,webp|max:1048',
            'name' => 'required',
            'price' => 'required|integer',
            'duration' => 'required' ,
            'feature.*' => ['required', 'string',]
          ];
        $request->validate($rules);
        $path = null;
        if ($request->has('img')){
            $file = $request->file('img');
            if ($file->isValid()) {
                    $old_file = null;
                    $path = $this->storeImg('plans' , $file , $old_file);
             }else{
                session()->flash('alert', ['class' => 'danger', 'msg' => __('admin.AnErrorOccurred')]);
            }
        }

        $plan = new Plan();
        $plan->img = $path;
        $plan->name = $request->name;
        $plan->price = $request->price;;
        $plan->duration = $request->duration;
        $plan->save();
        $features = $request->feature;
        $included = $request->included;
        foreach ($features as $key => $feature){
            $plan_feature = new PlanFeature();
            $plan_feature->plan_id = $plan->id;
            $plan_feature->name = $feature;
             if (isset($included[$key])) {
                    $plan_feature->included = $included[$key] === 'on' ? true : false;
            } else {
                $plan_feature->included = false; // Set a default value if included value is not provided
            }
                $plan_feature->save();
        }
        Cache::forget('plans');
        session()->flash('alert', ['class' => 'success', 'msg' => __('admin.TheOpreationDoneSuccessFully')]);
        return redirect()->to(route('admin.plans.index'));


    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
       $index_plans = 'show';
       $plan = Plan::findOrFail($id);
        return view('plan::admin.edit' , compact('index_plans' , 'plan'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
           $rules = [
            'img' => 'sometimes|image|mimes:jpeg,png,jpg,webp|max:1048',
            'name' => 'required',
            'price' => 'required|integer',
            'duration' => 'required' ,
            'feature.*' => ['required', 'string',]
          ];
        $request->validate($rules);
        $plan = Plan::findOrFail($id);

        if ($request->has('img')){
            $file = $request->file('img');
            if ($file->isValid()) {
                    $old_file = $plan->img;
                    $path = $this->storeImg('plans' , $file , $old_file);
                    $plan->img = $path;
             }else{
                session()->flash('alert', ['class' => 'danger', 'msg' => __('admin.AnErrorOccurred')]);
            }
        }
        $plan->name = $request->name;
        $plan->price = $request->price;;
        $plan->duration = $request->duration;
        $plan->save();

        $features = $request->feature;
        $included = $request->included;
        $featureId = $request->featureId;
        foreach ($features as $key => $feature) {
            $plan_feature = PlanFeature::where('plan_id', $plan->id)->where('id', $featureId[$key] )->first();

            // If the plan feature does not exist, create a new one
            if (!$plan_feature) {
                $plan_feature = new PlanFeature();
                $plan_feature->plan_id = $plan->id;
            }

            $plan_feature->name = $feature;

            // Check if the included value exists for the corresponding feature
            if (isset($included[$key])) {
                $plan_feature->included = $included[$key] == 'on' ? true : false;
            } else {
                $plan_feature->included = false; // Set a default value if included value is not provided
            }

            $plan_feature->save();
        }
        Cache::forget('plans');
        session()->flash('alert', ['class' => 'success', 'msg' => __('admin.TheOpreationDoneSuccessFully')]);
        return redirect()->to(route('admin.plans.index'));

    }


    public function destroy($id)
    {
       $plan = Plan::findOrFail($id);
       $plan->features()->delete();
       $this->deleteImg($plan->img);
       $plan->delete();
       Cache::forget('plans');
       session()->flash('alert', ['class' => 'success', 'msg' => __('admin.TheOpreationDoneSuccessFully')]);
        return redirect()->to(route('admin.plans.index'));
    }
    public function delete_feature($id){
        PlanFeature::findOrFail($id)->delete();
        Cache::forget('plans');
        session()->flash('alert', ['class' => 'success', 'msg' => __('admin.TheOpreationDoneSuccessFully')]);
        return back();
    }
}
