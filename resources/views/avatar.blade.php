@extends('layouts.web') 
@section('content')

<div class="container" style="color: white; padding: 50px; font-family: 'Roboto', Arial, sans-serif; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);">
    <!-- Title -->
    <h2 class="text-center bg-danger text-white py-3" 
        style="margin-bottom: 30px; border-radius: 10px; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);">
        Avatar
    </h2>

    <!-- Big Image -->
    <div style="text-align: center; margin-bottom: 30px;">
        <img src="{{ asset('images/avatar.jpg') }}" alt="Avatar Movie" style="width: 100%; max-width: 1200px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
    </div>

    <!-- Filter by Date -->
    <div style="text-align: center; margin-bottom: 20px;">
        <select id="filterSelect" style="padding: 10px; font-size: 1rem; border-radius: 5px; border: 1px solid #ddd;">
            <option value="">Filter by Date</option>
            <option value="Nov 27">Monday, Nov 27</option>
            <option value="Nov 29">Wednesday, Nov 29</option>
            <option value="Dec 1">Friday, Dec 1</option>
        </select>
    </div>

    <!-- Showtime Heading -->
    <p style="font-size: 1.5rem; margin-bottom: 20px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; color: #f8f9fa;">
        Showtimes:
    </p>

    <!-- Showtimes List -->
    <ul id="showtimeList" style="list-style: none; padding: 0; font-size: 1.2rem; margin: 0; max-width: 600px; line-height: 1.8;">
        <!-- Monday, Nov 27 -->
        <li class="showtimeItem" data-date="Nov 27" style="margin-bottom: 20px; display: flex; align-items: center;">
            <div style="border-left: 5px solid #dc3545; padding-left: 15px;">
                <strong style="color: #f8f9fa; font-size: 1.3rem; text-transform: uppercase;">Monday, Nov 27</strong>
                <div style="margin: 10px 0 0 20px;">
                    <button class="btn btn-time" style="margin-bottom: 10px; background-color: #dc3545; border: none; color: white; padding: 10px 20px; font-size: 1rem; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">6:00 PM</button>
                    <button class="btn btn-time" style="margin-bottom: 10px; background-color: #dc3545; border: none; color: white; padding: 10px 20px; font-size: 1rem; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">8:30 PM</button>
                </div>
            </div>
        </li>

        <!-- Wednesday, Nov 29 -->
        <li class="showtimeItem" data-date="Nov 29" style="margin-bottom: 20px; display: flex; align-items: center;">
            <div style="border-left: 5px solid #dc3545; padding-left: 15px;">
                <strong style="color: #f8f9fa; font-size: 1.3rem; text-transform: uppercase;">Wednesday, Nov 29</strong>
                <div style="margin: 10px 0 0 20px;">
                    <button class="btn btn-time" style="margin-bottom: 10px; background-color: #dc3545; border: none; color: white; padding: 10px 20px; font-size: 1rem; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">5:00 PM</button>
                    <button class="btn btn-time" style="margin-bottom: 10px; background-color: #dc3545; border: none; color: white; padding: 10px 20px; font-size: 1rem; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">7:30 PM</button>
                </div>
            </div>
        </li>

        <!-- Friday, Dec 1 -->
        <li class="showtimeItem" data-date="Dec 1" style="display: flex; align-items: center;">
            <div style="border-left: 5px solid #dc3545; padding-left: 15px;">
                <strong style="color: #f8f9fa; font-size: 1.3rem; text-transform: uppercase;">Friday, Dec 1</strong>
                <div style="margin: 10px 0 0 20px;">
                    <button class="btn btn-time" style="margin-bottom: 10px; background-color: #dc3545; border: none; color: white; padding: 10px 20px; font-size: 1rem; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">4:00 PM</button>
                    <button class="btn btn-time" style="margin-bottom: 10px; background-color: #dc3545; border: none; color: white; padding: 10px 20px; font-size: 1rem; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">6:30 PM</button>
                </div>
            </div>
        </li>
    </ul>
</div>

<script>
    // Filter functionality
    document.getElementById('filterSelect').addEventListener('change', function () {
        const selectedDate = this.value;
        const showtimeItems = document.querySelectorAll('.showtimeItem');

        showtimeItems.forEach(item => {
            const itemDate = item.getAttribute('data-date');
            if (selectedDate === '' || itemDate === selectedDate) {
                item.style.display = 'flex'; // Show matching or all items
            } else {
                item.style.display = 'none'; // Hide non-matching items
            }
        });
    });

    // Booking functionality for buttons
    document.querySelectorAll('.btn-time').forEach(button => {
        button.addEventListener('click', function () {
            const time = this.textContent.trim();
            const name = prompt('Enter your name:');
            if (!name) return;

            const age = prompt('Enter your age:');
            if (!age || isNaN(age)) return;

            const tickets = prompt('Enter the number of tickets:');
            if (!tickets || isNaN(tickets)) return;

            alert(`Booking Confirmed!\nTime: ${time}\nName: ${name}\nAge: ${age}\nTickets: ${tickets}`);
        });
    });
</script>

@endsection
