<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Rapport Officiel – Morocco 2030</title>
    <style>
        @page {
            margin: 0cm;
        }
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #444444;
            background-color: #FFFFFF;
            /* Margins for content pages to clear fixed header/footer */
            margin-top: 3.5cm;
            margin-bottom: 2.5cm;
            margin-left: 2cm;
            margin-right: 2cm;
            font-size: 11pt;
            line-height: 1.4;
        }
        
        /* Headers & Footers (Fixed on all pages) */
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 2.5cm;
            background-color: #FFFFFF;
            color: #8B0000;
            padding-right: 2cm;
            padding-left: 2cm;
            padding-top: 0.5cm;
            border-bottom: 3px solid #8B0000;
            z-index: 0;
        }

        .header-content {
            display: table;
            width: 100%;
        }
        .header-left {
            display: table-cell;
            vertical-align: middle;
            text-align: left;
            width: 50%;
        }
        .header-right {
            display: table-cell;
            vertical-align: middle;
            text-align: right;
            width: 50%;
            font-weight: bold;
            font-size: 10pt;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2cm;
            background-color: #FFFFFF;
            color: #777777;
            text-align: center;
            padding-top: 20px;
            font-size: 9pt;
            border-top: 1px solid #CCCCCC;
            z-index: 0;
        }

        /* Cover Page: Absolute to cover the page 1 header/footer */
        .cover-page {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #FFFFFF;
            z-index: 9999;
            display: block;
        }

        .cover-content {
            margin: 0 auto;
            text-align: center;
            padding-top: 30%;
            width: 80%;
        }

        /* Logo Styles */
        /* Logo Styles */
        .logo-brut {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-weight: bold;
            color: #000000;
            letter-spacing: 1px;
        }
        .logo-brut span {
            color: #8B0000;
        }

        /* Mini Logo for Header */
        .mini-logo-box {
            display: inline-block;
            width: 30px;
            height: 30px;
            background-color: #8B0000;
            color: white;
            font-size: 18px;
            font-weight: bold;
            line-height: 30px;
            text-align: center;
            border-radius: 6px;
            vertical-align: middle;
            margin-right: 10px;
        }
        .mini-logo-text {
            display: inline-block;
            font-size: 14pt;
            font-weight: bold;
            color: #444444;
            letter-spacing: 1px;
            vertical-align: middle;
        }

        h1.cover-title {
            color: #8B0000;
            font-size: 38pt;
            margin-bottom: 20px;
            margin-top: 30px;
            text-transform: uppercase;
            letter-spacing: 3px;
            border-bottom: none;
            line-height: 1.2;
        }

        .cover-subtitle {
            color: #444444;
            font-size: 18pt;
            margin-top: 20px;
            margin-bottom: 60px;
            font-weight: 300;
        }

        .cover-date {
            color: #666666;
            font-size: 12pt;
            margin-top: 40px;
        }

        .accent-line-center {
            width: 150px;
            height: 5px;
            background-color: #8B0000;
            margin: 40px auto;
        }

        .page-break {
            page-break-after: always;
        }

        /* Standard Headings */
        h1 {
            color: #8B0000;
            font-size: 22pt;
            border-bottom: 2px solid #8B0000;
            padding-bottom: 8px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        h2 {
            color: #444444;
            font-size: 16pt;
            margin-top: 25px;
            margin-bottom: 15px;
            border-left: 5px solid #8B0000;
            padding-left: 15px;
        }
        
        h3 {
            color: #666666;
            font-size: 13pt;
            margin-top: 20px;
            margin-bottom: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }

        p {
            margin-bottom: 12px;
            text-align: justify;
            text-justify: inter-word;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 10pt;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        th {
            background-color: #8B0000;
            color: #FFFFFF;
            padding: 12px 15px;
            text-align: left;
            text-transform: uppercase;
            font-size: 9pt;
            letter-spacing: 0.5px;
        }

        td {
            border: 1px solid #E0E0E0;
            padding: 12px 15px;
            color: #444444;
        }

        tr:nth-child(even) {
            background-color: #F8F8F8;
        }

        .highlight {
            color: #8B0000;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Header & Footer (Visible on pages 2+) -->
    <header>
        <div class="header-content">
            <div class="header-left">
                <div class="logo-brut" style="font-size: 24pt;"><span>M</span>orocco.</div>
                <div style="font-size: 8pt; color: #8B0000; font-weight: bold; letter-spacing: 3px; margin-top: -5px; padding-left: 2px;">2030</div>
            </div>
            <div class="header-right">
                OFFICIAL REPORT
            </div>
        </div>
    </header>

    <footer>
        <table style="width: 100%; border: none; margin: 0; box-shadow: none;">
            <tr style="background: none;">
                <td style="border: none; text-align: left; width: 33%;">
                    Generated on {{ $date }}
                </td>
                <td style="border: none; text-align: center; width: 34%;">
                    Official Document
                </td>
                <td style="border: none; text-align: right; width: 33%;">
                    Page <span class="page-number"></span>
                </td>
            </tr>
        </table>
    </footer>

    <!-- Cover Page (Masks the header/footer on page 1) -->
    <div class="cover-page">
        <div class="cover-content">
            <!-- Branding Logo -->
            <div style="margin-bottom: 40px;">
                <div class="logo-brut" style="font-size: 60pt;"><span>M</span>orocco.</div>
                <div style="font-size: 14pt; color: #8B0000; font-weight: bold; letter-spacing: 8px; margin-top: -10px; padding-left: 5px;">2030</div>
            </div>

            <h1 class="cover-title">Rapport Officiel</h1>
            <div class="accent-line-center"></div>
            <div class="cover-subtitle">Platform Performance & Strategic Insights</div>
            <div class="cover-date">{{ $date }}</div>
            <br><br><br>
            <div style="font-size: 10pt; color: #888;">CONFIDENTIAL DOCUMENT</div>
        </div>
    </div>

    <!-- Ensure content starts on a new page -->
    <div class="page-break"></div>

    <!-- Introduction -->
    <h1>Introduction</h1>
    <p>
        This official report provides a comprehensive overview of the "Discover Morocco 2030" platform's current status, data distribution, and user engagement metrics. The objective of this document is to analyze the digital footprint of the initiative, focusing on the promotion of host cities, destination management, and community involvement through volunteering.
    </p>
    <p>
        In the context of the 2030 World Cup, this platform serves as a pivotal hub for information and engagement. This report covers the structural growth of the database, the diversity of content across different regions, and the level of interaction from the public.
    </p>
    
    <!-- Data Overview -->
    <h1>Data Overview</h1>
    <p>
        The platform currently hosts a robust set of data points reflecting the rich cultural and geographic diversity of Morocco. Below is a detailed breakdown of the key entities managed within the system. The data indicates a steady accumulation of content, essential for the platform's readiness.
    </p>

    <table>
        <thead>
            <tr>
                <th>Metric Category</th>
                <th>Current Count</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Host Cities</strong></td>
                <td>{{ $stats['cities'] }}</td>
                <td>Active</td>
            </tr>
            <tr>
                <td><strong>Touristic Destinations</strong></td>
                <td>{{ $stats['destinations'] }}</td>
                <td>Verified</td>
            </tr>
            <tr>
                <td><strong>Registered Volunteers</strong></td>
                <td>{{ $stats['volunteers'] }}</td>
                <td>Pending/Approved</td>
            </tr>
            <tr>
                <td><strong>Contact Inquiries</strong></td>
                <td>{{ $stats['contacts'] }}</td>
                <td>Received</td>
            </tr>
            <tr>
                <td><strong>Newsletter Subscribers</strong></td>
                <td>{{ $stats['newsletters'] }}</td>
                <td>Subscribed</td>
            </tr>
            <tr>
                <td><strong>User Comments</strong></td>
                <td>{{ $stats['comments'] }}</td>
                <td>Moderated</td>
            </tr>
        </tbody>
    </table>

    <p>
        The table above highlights the core components of the "Discover Morocco 2030" ecosystem. With <strong>{{ $stats['cities'] }} major cities</strong> detailed and <strong>{{ $stats['destinations'] }} specific destinations</strong> highlighted, the content foundation is established. The volunteer base, standing at {{ $stats['volunteers'] }}, represents the human capital ready to support the initiative.
    </p>

    <!-- Analysis & Interpretation -->
    <div class="page-break"></div>
    <h1>Analysis & Interpretation</h1>
    
    <h2>Content Depth and Reach</h2>
    <p>
        Analyzing the relationship between cities and destinations provides insight into the content depth of the platform. Currently, the average density of destinations per city is approximately <span class="highlight">{{ $avg_destinations }}</span>. This figure serves as a key performance indicator for content richness.
    </p>
    <p>
        A higher ratio suggests detailed coverage of specific locales, which is crucial for tourist engagement. If the ratio is low, it indicates an opportunity to expand the database with more points of interest, restaurants, museums, and historical sites within the listed cities.
    </p>

    <h2>Community Engagement</h2>
    <p>
        The volunteer program has garnered <strong>{{ $stats['volunteers'] }} registrations</strong>. This demonstrates a significant public interest in participating in the 2030 vision. Engagement is further evidenced by the {{ $stats['contacts'] }} direct inquiries received, suggesting an active and curious audience.
    </p>
    <p>
        It is observed that the flow of inquiries (Contacts) often correlates with major announcements or updates. The recent inquiries verify that users are seeking specific information, likely related to volunteer opportunities or partnership possibilities.
    </p>

    <!-- Comparative Study -->
    <h1>Comparative Study</h1>
    <h3>Top Performing Cities</h3>
    <p>
        A comparative analysis of the cities reveals disparities in content population. The following cities currently lead in terms of associated destinations and content richness:
    </p>

    <table>
        <thead>
            <tr>
                <th>City Name</th>
                <th>Destinations Counted</th>
                <th>Share of Total (%)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($top_cities as $city)
            @php
                $percentage = $stats['destinations'] > 0 ? round(($city->destinations_count / $stats['destinations']) * 100, 1) : 0;
            @endphp
            <tr>
                <td>{{ $city->nom }}</td>
                <td>{{ $city->destinations_count }}</td>
                <td>{{ $percentage }}%</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p>
        The data shows that <strong>{{ $top_cities->first()->nom ?? 'N/A' }}</strong> is currently the most documented city. This concentration suggests a strong focus on this region. Conversely, other cities may require targeted content campaigns to ensure a balanced representation of Morocco's diverse offerings across all host cities.
    </p>

    <!-- Conclusion & Recommendations -->
    <div class="page-break"></div>
    <h1>Conclusion & Recommendations</h1>
    
    <h2>Conclusion</h2>
    <p>
        The "Discover Morocco 2030" platform is on a positive trajectory. The fundamental data structures—cities, destinations, and volunteers—are populated and functional. The design and data integrity meet professional standards, and the user engagement through volunteers and contacts is promising. The platform is well-positioned to scale as the 2030 event approaches.
    </p>

    <h2>Recommendations</h2>
    <p>
        Based on the data analysis, the following recommendations are improved:
    </p>
    <p>
        <strong>1. Content Balancing:</strong> Focus efforts on populating destinations for cities that currently have low representation compared to the top performers. A balanced distribution will ensure equitable promotion of all Moroccan regions.
    </p>
    <p>
        <strong>2. Volunteer Activation:</strong> With {{ $stats['volunteers'] }} volunteers registered, implement a strategy to keep this pool engaged through regular newsletters and preliminary tasks, preventing drop-off before 2030.
    </p>
    <p>
        <strong>3. Dynamic Engagement:</strong> leverage the interest shown in the 'Contact' section by introducing an FAQ section or an automated chatbot to handle common queries, converting interest into deeper platform engagement.
    </p>

    <script type="text/php">
        if (isset($pdf)) {
            $x = 520;
            $y = 820;
            $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
            $font = null;
            $size = 10;
            $color = array(0.2, 0.2, 0.2); // Grey
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
    </script>
</body>
</html>
