<?php

namespace App\Http\Controllers;

use App\Models\MemberDetail;
use App\Models\SupportTicket;
use App\Models\TicketText;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function createTick()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        return view('member.support.create-ticket')->with($result);
    }

    public function createTicket(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'issue' => 'required'
        ]);

        $memberid = $request->post('userid');
        $subject = $request->post('subject');
        $issue = $request->post('issue');
        $ticketid = $memberid . rand(10000, 99999);

        $sup = new SupportTicket();
        $sup->ticket_id = $ticketid;
        $sup->memberid = $memberid;
        $sup->subject = $subject;
        $sup->save();

        $text = new TicketText();
        $text->ticket_id = $ticketid;
        $text->written_by = 'Member';
        $text->text = $issue;
        $text->save();

        session()->flash('createMsg', 'Support Ticket has been created successfully. We will get back to you as soon as possible');
        return redirect()->back();
    }

    public function supportTickets()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['support'] = SupportTicket::where('memberid', $memberid)->orderBy('created_at', 'DESC')->get();
        return view('member.support.support-tickets')->with($result);
    }

    public function ViewsupportTickets($tid)
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['support'] = SupportTicket::where('ticket_id', $tid)->first();
        $result['tdata'] = TicketText::where('ticket_id', $tid)->orderBy('created_at', 'DESC')->get();
        $updates = TicketText::where([['ticket_id', $tid], ['written_by', 'Admin']])->get();
        foreach ($updates as $key) {
            $var = TicketText::find($key['id']);
            $var->status = 'Read';
            $var->save();
        }
        return view('member.support.view-support-tickets')->with($result);
    }

    public function MbReplyTicket(Request $request)
    {
        $request->validate([
            'reply' => 'required'
        ]);
        $ticketid = $request->post('ticketid');

        $text = new TicketText();
        $text->ticket_id = $ticketid;
        $text->written_by = 'Member';
        $text->text = $request->post('reply');
        $text->save();

        session()->flash('createMsg', 'Your reply has been added to Ticket successfully.');
        return redirect()->back();
    }

    public function newSupport(Request $request)
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();

        $query = SupportTicket::where('support_status', 'New');

        if ($request->filled('member_id')) {
            $query->where('memberid', 'like', '%' . trim($request->member_id) . '%');
        } elseif ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('memberid', 'like', "%{$search}%")
                  ->orWhere('ticket_id', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%");
            });
        }

        if ($request->filled('ticket_id')) {
            $query->where('ticket_id', 'like', '%' . trim($request->ticket_id) . '%');
        }

        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $result['support'] = $query->orderBy('created_at', 'DESC')->get();
        return view('admin.support.new-support-ticket')->with($result);
    }

    public function openSupport(Request $request)
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();

        $query = SupportTicket::where([['support_status', 'Replied'], ['status', 'Open']]);

        if ($request->filled('member_id')) {
            $query->where('memberid', 'like', '%' . trim($request->member_id) . '%');
        } elseif ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('memberid', 'like', "%{$search}%")
                  ->orWhere('ticket_id', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%");
            });
        }

        if ($request->filled('ticket_id')) {
            $query->where('ticket_id', 'like', '%' . trim($request->ticket_id) . '%');
        }

        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $result['support'] = $query->orderBy('created_at', 'DESC')->get();
        return view('admin.support.open-support-ticket')->with($result);
    }

    public function closeSupport(Request $request)
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();

        $query = SupportTicket::where('status', 'Closed');

        if ($request->filled('member_id')) {
            $query->where('memberid', 'like', '%' . trim($request->member_id) . '%');
        } elseif ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('memberid', 'like', "%{$search}%")
                  ->orWhere('ticket_id', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%");
            });
        }

        if ($request->filled('ticket_id')) {
            $query->where('ticket_id', 'like', '%' . trim($request->ticket_id) . '%');
        }

        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $result['support'] = $query->orderBy('created_at', 'DESC')->get();
        return view('admin.support.close-support-ticket')->with($result);
    }

    public function viewSupport($id)
    {
        $result['support'] = SupportTicket::find($id);
        $ticketid = $result['support']['ticket_id'];
        $updates = TicketText::where([['ticket_id', $ticketid], ['written_by', 'Member']])->get();
        foreach ($updates as $key) {
            $var = TicketText::find($key['id']);
            $var->status = 'Read';
            $var->save();
        }
        $result['tictext'] = TicketText::where('ticket_id', $ticketid)->orderBy('created_at', 'desc')->get();
        return view('admin.support.view-support-ticket')->with($result);
    }

    public function viewClosed($id)
    {
        $result['support'] = SupportTicket::find($id);
        $ticketid = $result['support']['ticket_id'];
        $result['tictext'] = TicketText::where('ticket_id', $ticketid)->orderBy('created_at', 'desc')->get();
        return view('admin.support.view-closed-ticket')->with($result);
    }

    public function closedTicket(Request $request, $id)
    {
        $result['support'] = SupportTicket::where('ticket_id', $id)->first();
        $result['support']->status = 'Closed';
        $result['support']->save();
        return redirect('admin/support/close-support-ticket');
    }

    public function Ticket(Request $request)
    {
        $request->validate([
            'reply' => 'required',
        ]);
        $ticketid = $request->post('ticket_id');

        $text = new TicketText();
        $text->ticket_id = $ticketid;
        $text->written_by = 'Admin';
        $text->text = $request->post('reply');
        $text->save();

        $update = SupportTicket::where('ticket_id', $ticketid)->first();
        $update->support_status = 'Replied';
        $update->save();

        session()->flash('createMsg', 'Your reply has been added to Ticket successfully.');
        return redirect()->back();
    }
}
