@extends('layouts.template-induk')


@push('custom-script')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = new bootstrap.Modal(document.getElementById('eventModal'));
        let calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: '{{ route('events.get') }}', // Endpoint untuk dapatkan events
            editable: true,
            selectable: true,

            // Bila user select date range
            select: function(info) {
                document.getElementById('eventId').value = '';
                document.getElementById('eventTitle').value = '';
                document.getElementById('eventDescription').value = '';
                document.getElementById('eventStart').value = info.startStr;
                document.getElementById('eventEnd').value = info.endStr;
                document.getElementById('eventColor').value = '#3788d8';
                document.getElementById('allDay').checked = info.allDay;
                modal.show();
            },

            // Bila user click event
            eventClick: function(info) {
                document.getElementById('eventId').value = info.event.id;
                document.getElementById('eventTitle').value = info.event.title;
                document.getElementById('eventDescription').value = info.event.extendedProps.description;
                document.getElementById('eventStart').value = info.event.start.toISOString().slice(0, 16);
                document.getElementById('eventEnd').value = info.event.end ? info.event.end.toISOString().slice(0, 16) : '';
                document.getElementById('eventColor').value = info.event.backgroundColor || '#3788d8';
                document.getElementById('allDay').checked = info.event.allDay;
                modal.show();
            }
        });

        calendar.render();

        // Save event
        document.getElementById('saveEvent').addEventListener('click', function() {
            const eventId = document.getElementById('eventId').value;
            const eventData = {
                title: document.getElementById('eventTitle').value,
                description: document.getElementById('eventDescription').value,
                start: document.getElementById('eventStart').value,
                end: document.getElementById('eventEnd').value,
                color: document.getElementById('eventColor').value,
                all_day: document.getElementById('allDay').checked
            };

            const url = eventId ? '/events/${eventId}' : '/events';
            const method = eventId ? 'PUT' : 'POST';

            fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(eventData)
            })
            .then(response => response.json())
            .then(data => {
                calendar.refetchEvents();
                modal.hide();
            });
        });

        // Delete event
        document.getElementById('deleteEvent').addEventListener('click', function() {
            const eventId = document.getElementById('eventId').value;
            if (!eventId) return;

            if (confirm('Are you sure you want to delete this event?')) {
                fetch('/events/${eventId}', {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(() => {
                    calendar.refetchEvents();
                    modal.hide();
                });
            }
        });
    });
</script>
@endpush

@section('section-page-header')
@endsection

@section('section-page-body')
<div class="container mt-5">

    @include('layouts.template-alerts')

    <div class="row mb-5">
        <div class="col-12">
            <a href="#" data-bs-toggle="modal" data-bs-target="#eventModal" class="btn btn-primary">Tambah Event</a>
        </div>
    </div>

    <div id='calendar'></div>
</div>

<!-- Modal for adding/editing events -->
<div class="modal fade" id="eventModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('events.store') }}">
            @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Event Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="eventId">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" id="eventTitle" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" id="eventDescription" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Start Date</label>
                        <input type="datetime-local" class="form-control" id="eventStart" name="start" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">End Date</label>
                        <input type="datetime-local" class="form-control" id="eventEnd" name="end" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Color</label>
                        <input type="color" class="form-control" id="eventColor" name="color">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="allDay" name="all_day" value="1">
                        <label class="form-check-label">All Day</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="deleteEvent">Delete</button>
                <button type="submit" class="btn btn-primary" id="saveEvent">Save</button>
            </div>
        </div>

    </form>
    </div>
</div>
@endsection
