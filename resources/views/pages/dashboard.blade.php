@extends('layouts.app')

@section('content')
<style>
    body {
          font-family: 'Poppins', sans-serif;
          background-color: #fff;
          color: #212529;
          margin: 0;
          padding: 0;
        }
        /* Header Navbar */
        .navbar-light {
          background-color: #f8f9fa;
          padding: 0.8rem 2rem;
          box-shadow: 0 2px 6px rgb(0 0 0 / 0.05);
          font-weight: 600;
        }

        .navbar-brand {
          font-weight: 800;
          color: #B6252A !important;
          font-size: 1.5rem;
          display: flex;
          align-items: center;
          gap: 0.2rem;
        }
        .navbar-brand small {
          font-size: 0.52rem;
          font-weight: 300;
          color: #666;
          display: block;
          margin-left: 0.4rem;
          font-family: 'Poppins', sans-serif;
        }

        /* Rounded corner main image */
        .main-image-container {
          max-width: 900px;
          margin: 2rem auto 3rem;
          position: relative;
          border-radius: 1.5rem;
          overflow: hidden;
          box-shadow: 0 8px 20px rgb(0 0 0 / 0.1);
          background: #fff;
        }
        .main-image-container img {
          width: 100%;
          object-fit: cover;
          display: block;
          border-radius: 1.5rem;
        }
        /* Character images overlay bottom right */
        .character-overlay {
          position: absolute;
          bottom: 12px;
          right: 12px;
          width: 120px;
          pointer-events: none;
        }
        /* Stats bar */
        .stats-bar {
          background: linear-gradient(180deg, #d80f0f, #800000);
          max-width: 960px;
          margin: 2rem auto 4rem;
          padding: 1.7rem 1rem;
          display: flex;
          justify-content: space-around;
          gap: 1rem;
          border-radius: 1.5rem;
          box-shadow: 0 10px 25px rgb(216 15 15 / 0.8);
        }
        .stat-card {
          flex: 1 1 0;
          background: linear-gradient(180deg, #222222cc, #888888cc);
          border-radius: 1rem;
          color: white;
          padding: 1.4rem 1rem;
          box-shadow: inset 0 -30px 30px rgb(255 255 255 / 0.1);
          min-width: 90px;
          text-align: center;
          font-weight: 600;
          user-select: none;
        }
        .stat-label {
          font-size: 0.85rem;
          opacity: 0.85;
          margin-bottom: 0.3rem;
          letter-spacing: 0.03em;
        }
        .stat-value {
          font-size: 1.8rem;
          line-height: 1.1;
          letter-spacing: 0.02em;
          font-weight: 700;
        }
        .stat-change {
          font-size: 0.8rem;
          margin-top: 0.3rem;
          color: #ccc;
          display: flex;
          align-items: center;
          justify-content: center;
          gap: 0.2rem;
        }
        .stat-change svg {
          width: 14px;
          height: 14px;
          stroke: currentColor;
          stroke-width: 2;
          stroke-linejoin: round;
          stroke-linecap: round;
        }
        /* Positive and Negative coloring for stat changes */
        .stat-positive {
          color: #90ee90;
        }
        .stat-negative {
          color: #ff6666;
        }
        /* Kalender Button */
        .btn-kalender {
          display: block;
          margin: 0 auto 1rem auto;
          background-color: #d80f0f;
          border: none;
          color: white;
          font-weight: 700;
          padding: 0.55rem 2.3rem;
          border-radius: 1rem;
          letter-spacing: 0.05em;
          user-select: none;
          transition: background-color 0.3s;
          cursor: default;
        }
        .btn-kalender:focus,
        .btn-kalender:hover {
          background-color: #a20a0a;
          outline: none;
          cursor: default;
        }
        /* Kalender Table Styles */
        .kalender-container {
          max-width: 500px;
          margin: 0 auto 3rem;
          border-radius: 0.5rem;
          border: 4px solid #939393;
          background-color: #fff;
          box-shadow: 3px 3px 8px rgb(0 0 0 / 0.2);
        }
        .kalender-header {
          display: flex;
          justify-content: space-around;
          background-color: #cbcbcb;
          color: #404040;
          font-weight: 600;
          font-size: 1.1rem;
          padding: 0.5rem 0;
          user-select: none;
          border-radius: 0.3rem 0.3rem 0 0;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .kalender-header div {
          flex: 1;
          text-align: center;
        }
        table.kalender-table {
          width: 100%;
          border-collapse: collapse;
          font-weight: 500;
          font-size: 1rem;
          user-select: none;
        }
        table.kalender-table thead tr th {
          border: 2px solid #939393;
          padding: 0.35rem 0;
          background-color: #f9f9f9;
          color: #222;
          font-weight: 600;
        }
        table.kalender-table tbody tr td {
          border: 2px solid #939393;
          text-align: center;
          padding: 0.6rem 0;
          color: #121212;
          cursor: default;
          letter-spacing: 0.01em;
        }
        table.kalender-table tbody tr td.outside-month {
          color: #bbbbbb;
          pointer-events: none;
        }
        table.kalender-table tbody tr td.today {
          background-color: #939393;
          color: white;
          border-radius: 50%;
          font-weight: 700;
          user-select: none;
        }
        /* Footer styles */
        footer {
          background-color: #1b0c0c;
          color: #ccc;
          padding: 2.5rem 1rem 1.5rem;
          font-size: 0.9rem;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        footer .footer-wrapper {
          max-width: 960px;
          margin: 0 auto;
          display: flex;
          flex-wrap: wrap;
          justify-content: space-between;
          gap: 2rem;
        }
        footer .footer-left,
        footer .footer-right {
          flex: 1 1 300px;
          min-width: 280px;
        }
        /* Social icons container */
        .social-icons {
          display: flex;
          gap: 1rem;
          margin-bottom: 1.2rem;
        }
        .social-icons a {
          color: #ccc;
          text-decoration: none;
          font-size: 1.7rem;
          transition: color 0.2s;
        }
        .social-icons a:hover,
        .social-icons a:focus {
          color: #d80f0f;
          outline: none;
        }
        /* Simple icon styling for footer from bootstrap icons */
        .bi {
          vertical-align: middle;
          fill: currentColor;
        }
        /* Contact info styling */
        .contact-address strong {
          font-weight: 600;
          color: #fff;
        }
        .footer-email {
          margin-top: 1rem;
          color: #bbb;
        }
        hr.footer-divider {
          border-color: #3a2a2a;
          margin: 1.8rem 0 1rem;
          opacity: 0.6;
        }
        footer .copyright {
          text-align: center;
          font-size: 0.8rem;
          color: #808080;
          user-select: none;
          letter-spacing: 0.03em;
        }
        /* Map container */
        .map-container {
          border-radius: 0.6rem;
          overflow: hidden;
          box-shadow: 0 2px 10px rgb(0 0 0 / 0.3);
          max-width: 300px;
          height: 190px;
        }
        .map-container iframe {
          width: 100%;
          height: 100%;
          border: 0;
          display:block;
        }
        @media (max-width: 576px) {
          .stats-bar {
            flex-wrap: wrap;
            gap: 0.6rem;
          }
          .stat-card {
            flex: 1 1 45%;
            min-width: auto;
          }
          .kalender-container {
            max-width: 100%;
            border-width: 3px;
          }
          .footer-wrapper {
            flex-direction: column;
            gap: 3rem;
          }
          .main-image-container {
            margin: 1rem 0 2rem;
          }
          .character-overlay {
            display: none;
          }
        }
      </style>
    </head>
    <body>

      <!-- Main image section with overlay characters -->
      <section class="main-image-container" aria-label="Telkom Akses office building with overlayed illustration of two technicians in red uniform and safety helmet walking together">
        <img src="https://placehold.co/900x350?text=Telkom+Akses+Office+Building&font=roboto" alt="Modern Telkom Akses office building facade with grey cladding and large windows under a clear sky" />
        <img class="character-overlay" src="https://placehold.co/120x150?text=Illustration+Technicians+Red+Uniform+Safety+Helmet" alt="Illustration of two technicians walking, wearing red uniforms and safety helmets, holding tools and equipment" onerror="this.style.display='none'" />
      </section>

      <!-- Stats cards -->
      <section class="stats-bar" aria-label="Website statistics summary cards">
        <div class="stat-card" tabindex="0" role="group" aria-labelledby="lbl-views val-views">
          <div class="stat-label" id="lbl-views">Views</div>
          <div class="stat-value" id="val-views">7,265</div>
          <div class="stat-change stat-positive" aria-label="change plus eleven point zero one percent">
            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><polyline points="6 15 12 9 18 15" /></svg>
            +11.01%
          </div>
        </div>
        <div class="stat-card" tabindex="0" role="group" aria-labelledby="lbl-visits val-visits">
          <div class="stat-label" id="lbl-visits">Visits</div>
          <div class="stat-value" id="val-visits">3,671</div>
          <div class="stat-change stat-negative" aria-label="change minus zero point zero three percent">
            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false" style="transform: rotate(180deg);"><polyline points="6 15 12 9 18 15" /></svg>
            -0.03%
          </div>
        </div>
        <div class="stat-card" tabindex="0" role="group" aria-labelledby="lbl-new-users val-new-users">
          <div class="stat-label" id="lbl-new-users">New Users</div>
          <div class="stat-value" id="val-new-users">256</div>
          <div class="stat-change stat-positive" aria-label="change plus fifteen point zero three percent">
            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><polyline points="6 15 12 9 18 15" /></svg>
            +15.03%
          </div>
        </div>
        <div class="stat-card" tabindex="0" role="group" aria-labelledby="lbl-active-users val-active-users">
          <div class="stat-label" id="lbl-active-users">Active Users</div>
          <div class="stat-value" id="val-active-users">2,318</div>
          <div class="stat-change stat-positive" aria-label="change plus six point zero eight percent">
            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><polyline points="6 15 12 9 18 15" /></svg>
            +6.08%
          </div>
        </div>
      </section>

      <!-- Kalender button -->
      <button type="button" class="btn btn-kalender" aria-label="Button labeled Kalender" disabled> KALENDER </button>

      <!-- Kalender table -->
    <div style="max-width: 800px; margin: auto; padding: 30px; background: #0a0a0a; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.4); color: white; font-family: 'Segoe UI', sans-serif;">
      <h2 style="color: #fff; text-align: center; margin-bottom: 10px;">📅 Kalender Jadwal</h2>
      <p style="color: #ccc; text-align: center; font-size: 14px; margin-bottom: 30px;">
        Gunakan kalender ini untuk melihat jadwal dan tanggal penting dari kegiatan Telkom Akses.
      </p>

      <div id="calendar-container">
        <div id="calendar-header">
          <button id="prev-month">&#10094;</button>
          <h2 id="month-year"></h2>
          <button id="next-month">&#10095;</button>
        </div>
        <div id="calendar-days">
          <div>Min</div><div>Sen</div><div>Sel</div><div>Rab</div><div>Kam</div><div>Jum</div><div>Sab</div>
        </div>
        <div id="calendar-dates"></div>
      </div>
    </div>

    <style>
      #calendar-container {
        max-width: 100%;
        background: #1a1a1a;
        color: #fff;
        border-radius: 15px;
        box-shadow: 0 0px 18px rgba(0,0,0,0.5);
        overflow: hidden;
        font-family: 'Segoe UI', sans-serif;
      }

      #calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #cc0000;
        padding: 15px 20px;
      }

      #calendar-header h2 {
        font-size: 20px;
        margin: 0;
      }

      #calendar-header button {
        background: none;
        border: none;
        font-size: 20px;
        color: white;
        cursor: pointer;
      }

      #calendar-days, #calendar-dates {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        text-align: center;
        padding: 10px 0;
      }

      #calendar-days div {
        font-weight: bold;
        color: #ffbbbb;
        font-size: 13px;
      }

      #calendar-dates div {
        padding: 12px 0;
        font-size: 14px;
        transition: 0.3s;
        cursor: pointer;
      }

      #calendar-dates div:hover {
        background: #ff4444;
        border-radius: 50%;
      }

      .today {
        background: #ffffff;
        color: #cc0000;
        font-weight: bold;
        border-radius: 50%;
      }
    </style>

    <script>
      const monthYear = document.getElementById("month-year");
      const calendarDates = document.getElementById("calendar-dates");
      const prevBtn = document.getElementById("prev-month");
      const nextBtn = document.getElementById("next-month");

      const today = new Date();
      let currentMonth = today.getMonth();
      let currentYear = today.getFullYear();

      function renderCalendar(month, year) {
        const firstDay = new Date(year, month).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        calendarDates.innerHTML = "";

        monthYear.textContent = `${today.toLocaleString('id-ID', { month: 'long' })} ${year}`;

        for (let i = 0; i < firstDay; i++) {
          calendarDates.innerHTML += "<div></div>";
        }

        for (let day = 1; day <= daysInMonth; day++) {
          const dayCell = document.createElement("div");
          dayCell.textContent = day;

          if (
            day === today.getDate() &&
            month === today.getMonth() &&
            year === today.getFullYear()
          ) {
            dayCell.classList.add("today");
          }

          calendarDates.appendChild(dayCell);
        }
      }

      prevBtn.addEventListener("click", () => {
        currentMonth--;
        if (currentMonth < 0) {
          currentMonth = 11;
          currentYear--;
        }
        renderCalendar(currentMonth, currentYear);
      });

      nextBtn.addEventListener("click", () => {
        currentMonth++;
        if (currentMonth > 11) {
          currentMonth = 0;
          currentYear++;
        }
        renderCalendar(currentMonth, currentYear);
      });

      renderCalendar(currentMonth, currentYear);
    </script>

    <!-- STYLE -->
    <style>
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');

    .custom-footer {
      background-color: #000000;
      color: #fff;
      padding: 50px 20px 20px 20px;
      font-family: 'Poppins', sans-serif;
    }

    .footer-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 40px;
    }

    .footer-left,
    .footer-right {
      flex: 1 1 300px;
    }

    .footer-left h3,
    .footer-right h3 {
      margin-bottom: 15px;
    }

    .footer-left p {
      margin-top: 10px;
      line-height: 1.7;
    }

    .social-icons {
      display: flex;
      gap: 15px;
      margin-bottom: 25px;
    }

    .social-icons a {
      color: white;
      font-size: 22px;
      transition: color 0.3s ease;
    }

    .social-icons a:hover {
      color: #c8102e;
    }

    hr {
      border: none;
      border-top: 1px solid #ffffff33;
      margin: 40px 0 20px 0;
    }

    p.copyright {
      text-align: center;
      font-size: 14px;
      color: #ccc;
    }
    .custom-footer {
      width: 100vw !important;
      margin-left: calc(-50vw + 50%);
      background-color: #000 !important;
      color: #fff !important;
    }

    .custom-footer h3, .custom-footer p {
      color: #fff !important;
    }
    </style>
      </footer>
@endsection
