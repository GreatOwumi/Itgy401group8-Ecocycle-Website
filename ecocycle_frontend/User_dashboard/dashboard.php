<?php
// Start the session or include any necessary PHP code here
session_start();
// You can include database connection or other PHP logic here
// For example:
// include 'db_connection.php';
// Check if the user is logged in, etc.
?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="dashboard.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Dashboard</title>
  </head>
  <body>
    <div class="container">
      <!-- Sidebar -->
      <aside class="sidebar">
        <div class="logo"><img src="../images/ECO GREEN.png" alt="" /></div>
        <nav>
          <ul>
            <li><span>GENERAL</span></li>
            <li>
              <a href="../User_dashboard/dashboard.html" class="active"
                >Dashboard</a
              >
            </li>
            <li><a href="#">Centers</a></li>
            <li>
              <a href="../User_leaderboard/leaderboard.html">Leaderboard</a>
            </li>
            <li>
              <a href="../User_notification/notification.html">Notifications</a>
            </li>
            <li><span>FINANCES</span></li>
            <li><a href="../User_withdrawal/withdrawal.html">Withdrawal</a></li>
            <li><a href="../User_analytics/analytics.html">Analytics</a></li>
            <li><span>SETTINGS</span></li>
            <li>
              <a href="../User_profile/profile.html">My Profile</a>
            </li>
            <li><a href="#">Logout</a></li>
          </ul>
        </nav>
      </aside>

      <div class="main-content">
        <div class="contained">
          <p>General > <span>Dashboard</span></p>
          <div class="profile-card">
            <div>
              <img src="../images/user.png" alt="" class="profile-pic" />
            </div>
            <div>
              <p>S. Ebeisuwa</p>
            </div>
          </div>
        </div>
        <div class="user-stuff">
          <h1>Welcome to your Dashboard</h1>
          <p>
            Track your progress, rewards, and environmental impact from this
            page.
          </p>

          <!-- Chart Section -->
          <div
            style="
              display: flex;
              align-items: center;
              gap: 2rem;
              margin-top: 10%;
            "
          >
            <div style="display: flex; flex-direction: column; gap: 3rem">
              <div>
                <h1>&#8358;119,233.70</h1>
                <p>Income Balance</p>
              </div>
              <div>
                <h1>422.96 kg</h1>
                <p>waste turned in.</p>
              </div>
            </div>
            <div class="chart">
              <canvas id="myChart" width="50" height="30"></canvas>
            </div>
          </div>
          <div>
            <div
              style="
                display: flex;
                width: 80%;
                align-items: center;
                justify-content: space-between;
                padding: 0px 0px 0px 30px;
              "
            >
              <select name="mats" id="mats">
                <option value="">Material</option>
                <option value="">Aluminium</option>
                <option value="">Plastic</option>
                <option value="">Rubber</option>
                <option value="">Glass</option>
              </select>
              <div>
                <label for="kg">kg</label>
                <input
                  type="number"
                  name="kg"
                  id="kg"
                  style="width: 50px"
                  value="15"
                />
              </div>
            </div>
            <table class="materials-table">
              <tbody class="tdetails">
                <tr class="rows">
                  <td class="user">
                    <img
                      src="../User_leaderboard/LeadershipImg/water-bottle (1) g 3.svg"
                    />
                    Glass
                  </td>
                  <td>$0.03</td>
                </tr>
                <tr class="rows">
                  <td class="user">
                    <img
                      src="../User_leaderboard/LeadershipImg/aluminum g 3.svg"
                    />
                    Aluminium
                  </td>
                  <td>$0.03</td>
                </tr>
                <tr class="rows">
                  <td class="user">
                    <img
                      src="../User_leaderboard/LeadershipImg/scroll g 3.svg"
                    />
                    Paper
                  </td>
                  <td>$0.03</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <script src="../User_dashboard/dashboard.js"></script>
  </body>
</html>
