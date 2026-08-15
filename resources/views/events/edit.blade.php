@extends('layouts.app')

@section('title', 'Edit Event')

@section('content')

    <div class="page-header">

        <div>
            <p class="breadcrumb">
                Workspace / Events / Edit
            </p>

            <h1>Edit Event</h1>

            <p class="page-description">
                Update the details of your event.
            </p>
        </div>

        <a
            href="{{ route('events.show', $event) }}"
            class="secondary-button"
        >
            ← Back to Event
        </a>

    </div>


    <div class="form-card">

        <form
            action="{{ route('events.update', $event) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="form-grid">

                <div class="form-group">

                    <label
                        for="title"
                        class="form-label"
                    >
                        Event Name
                    </label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="form-input"
                        value="{{ old('title', $event->title) }}"
                        required
                    >

                    @error('title')
                        <span class="form-error">{{ $message }}</span>
                    @enderror

                </div>


                <div class="form-group">

                    <label
                        for="category"
                        class="form-label"
                    >
                        Category
                    </label>

                    <select
                        id="category"
                        name="category"
                        class="form-select"
                        required
                    >

                        @foreach(['Music', 'Workshop', 'Conference', 'Birthday', 'Wedding', 'Other'] as $category)

                            <option
                                value="{{ $category }}"
                                {{ old('category', $event->category) === $category ? 'selected' : '' }}
                            >
                                {{ $category }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="form-group full-width">

                    <label
                        for="description"
                        class="form-label"
                    >
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        class="form-textarea"
                        required
                    >{{ old('description', $event->description) }}</textarea>

                </div>


                <div class="form-group">

                    <label
                        for="location"
                        class="form-label"
                    >
                        Location
                    </label>

                    <input
                        type="text"
                        id="location"
                        name="location"
                        class="form-input"
                        value="{{ old('location', $event->location) }}"
                        required
                    >

                </div>


                <div class="form-group">

                    <label
                        for="organizer"
                        class="form-label"
                    >
                        Organizer
                    </label>

                    <input
                        type="text"
                        id="organizer"
                        name="organizer"
                        class="form-input"
                        value="{{ old('organizer', $event->organizer) }}"
                        required
                    >

                </div>


                <div class="form-group">

                    <label
                        for="event_date"
                        class="form-label"
                    >
                        Event Date
                    </label>

                    <input
                        type="date"
                        id="event_date"
                        name="event_date"
                        class="form-input"
                        value="{{ old('event_date', $event->event_date->format('Y-m-d')) }}"
                        required
                    >

                </div>


                <div class="form-group">

                    <label
                        for="event_time"
                        class="form-label"
                    >
                        Event Time
                    </label>

                    <input
                        type="time"
                        id="event_time"
                        name="event_time"
                        class="form-input"
                        value="{{ old('event_time', $event->event_time) }}"
                        required
                    >

                </div>


                <div class="form-group">

                    <label
                        for="image"
                        class="form-label"
                    >
                        Image URL
                    </label>

                    <input
                        type="text"
                        id="image"
                        name="image"
                        class="form-input"
                        value="{{ old('image', $event->image) }}"
                    >

                </div>


                <div class="form-group">

                    <label
                        for="status"
                        class="form-label"
                    >
                        Status
                    </label>

                    <select
                        id="status"
                        name="status"
                        class="form-select"
                        required
                    >

                        @foreach(['upcoming', 'ongoing', 'completed'] as $status)

                            <option
                                value="{{ $status }}"
                                {{ old('status', $event->status) === $status ? 'selected' : '' }}
                            >
                                {{ ucfirst($status) }}
                            </option>

                        @endforeach

                    </select>

                </div>

            </div>


            <div class="form-actions">

                <button
                    type="submit"
                    class="primary-button"
                >
                    Save Changes
                </button>

                <a
                    href="{{ route('events.show', $event) }}"
                    class="secondary-button"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

@endsection