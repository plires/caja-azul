<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Subscription;
use App\User;
use App\Status;
use App\FishBox;

class SubscriptionsController extends Controller
{
    public function Index()
    {
    	$subscriptions = Subscription::paginate(10);

    	return view('admin.subscriptions.index')->with(compact('subscriptions'));
    }

    public function Create()
  	{
  		$users = User::orderBy('name', 'asc')->get();
  		$statuses = Status::orderBy('name', 'asc')->get();
  		$fishBoxes = FishBox::orderBy('name', 'asc')->get();

  		return view('admin.subscriptions.create')->with(compact('users', 'statuses', 'fishBoxes'));
  	}

}
