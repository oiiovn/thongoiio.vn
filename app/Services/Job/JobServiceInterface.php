<?php

namespace App\Services\Job;
use Illuminate\Http\Request;

interface JobServiceInterface
{
    /**
     * Tạo mới
     * 
     * @var Illuminate\Http\Request $request
     * 
     * @return mixed
     */
    public function store(Request $request);
    /**
     * Cập nhật
     * 
     * @var Illuminate\Http\Request $request
     * 
     * @return boolean
     */
    public function updateProccess(Request $request);
    public function updateHistoryProccess(Request $request);
    public function update(Request $request);
    public function indexReceived($status, Request $request);
    public function storeReceive(Request $request);
    public function handleCharge($wallet, $amount, $job, $note, $exception = false);
    public function handleAddMoney($wallet, $job, $note);
}