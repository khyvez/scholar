<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Alert;
class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('member', compact('members'));
    }

    public function create()
    {
        return view('registration');
    }

    public function store(Request $request)
    {
       
      Member::create($request->all());
      Alert::success('Success Title', 'Success Message');

      return redirect()->route('member.index');
    }
    public function show(Member $member)
    {
        //
    }

    public function edit(Member $member)
    {
        //
    }

    public function update(Request $request, Member $member)
    {
        //
    }

    public function destroy(Member $member)
    {
        //
    }
}
