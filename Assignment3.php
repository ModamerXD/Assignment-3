<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UOB Students by Nationality</title>
    <style>
        body {
            background-color: #f9f9f9;
            color: #333;
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        header {
            text-align: center;
            margin-bottom: 1rem;
        }

        header h1 {
            font-size: 2rem;
            color: #0056b3;
        }

        header p {
            color: #555;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 100%;
            max-width: 70%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        
        }

        table th, table td {
            text-align: left;
            padding: 1rem;
            border: 1px solid #333;
        }

        table th {
            background-color: #0056b3;
            color: white;
        }
      

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        footer {
    text-align: center;
    margin-top: 2rem;
    padding: 0.5rem 1rem; 
    background-color: #0056b3; 
    color: white;
    font-size: 0.85rem; 
        }

        footer a {
            color: #ffd700; 
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline; 
        }

        /* Responsive table */
        @media (max-width: 768px) {

            table {
                font-size: 0.8rem;
                width: 100%;
                overflow-x: auto;
            }
        }

        p.empty{
             text-align : center;
             color : red;
        }

    </style>
   
</head>
<body>
    <header>
        <h1>UOB Students by Nationality</h1>
        <p>Data retrieved from the Bahrain Open Data Portal.</p>
    </header>
    <div id="container">

        
        
    <script> 
                
                async function getData() {
                    const url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";
                    const responce = await fetch(url);
                    const data = await responce.json();

                    const tableContainer = document.getElementById("container");
                    const table = document.createElement('table');
                    const thead = document.createElement('thead');
                    const headRow = document.createElement('tr');
                    const headers = ['Year', 'Semester', 'The Programs', 'Nationality','Colleges', 'Number of Students'];

                    headers.forEach(header => {
                        let th = document.createElement('th');
                        th.textContent = header;
                        headRow.appendChild(th);
                    });
                    
                    thead.appendChild(headRow);
                    table.appendChild(thead);

                    const tbody = document.createElement('tbody');

                    for (let i = 0; i < data.results.length ; i++) {
                        const row = document.createElement('tr');
                        const currentItem = data.results[i];

                        const tdYear = document.createElement('td');
                        tdYear.textContent = data.results[i]['year'];
                        row.appendChild(tdYear);

                        const tdSemester = document.createElement('td');
                        tdSemester.textContent = data.results[i]['semester'];
                        row.appendChild(tdSemester);

                        const tdProgram = document.createElement('td');
                        tdProgram.textContent = data.results[i]['the_programs'];
                        row.appendChild(tdProgram);

                        const tdNationality = document.createElement('td');
                        tdNationality.textContent = data.results[i]['nationality'];
                        row.appendChild(tdNationality);

                        const tdColleges = document.createElement('td');
                        tdColleges.textContent = data.results[i]['colleges'];
                        row.appendChild(tdColleges);

                        const tdNumberOfStudents = document.createElement('td');
                        tdNumberOfStudents.textContent = data.results[i]['number_of_students'];
                        row.appendChild(tdNumberOfStudents);
                                            
                               
                            
                        tbody.appendChild(row);
                    }


                    table.appendChild(tbody);

                    tableContainer.appendChild(table);
                   
}
            getData();
            
            
       </script>
    </div>
    <footer>
        <p>Powered by the <a href="https://data.gov.bh">Bahrain Open Data Portal</a> | UOB Students Enrollment</p>
    </footer>
</body>
</html>
