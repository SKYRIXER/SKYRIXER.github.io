const projects = [
  {
    title: "Block Tower Defense (Unity)",
    description: "Ensimmäinen kokonainen Unity-peliprojekti, jossa opin pelilogiikan ja UI:n rakentamista.",
    link: "https://play.unity.com/mg/other/builds-u4-6",
    year: 2024,
    image: "./imgs/unityTD.png"
  },
  {
    title: "Haikuron.fi",
    description: "Responsiivinen ja käyttövalmis verkkosivusto kennelin brändille ja palveluille. Toteutettu Next.js:llä ja Tailwind CSS:llä.",
    link: "https://haikuron.fi",
    year: 2025,
    image: "./imgs/kennel.jpg"
  }
];

function groupProjectsByYear(projectList) {
  const grouped = {};
  
  projectList.forEach(project => {
    if (!grouped[project.year]) {
      grouped[project.year] = [];
    }
    grouped[project.year].push(project);
  });
  
  return grouped;
}

function renderProjects() {
  const container = document.getElementById("projects-container");
  const grouped = groupProjectsByYear(projects);
  
  const years = Object.keys(grouped)
    .map(Number)
    .sort((a, b) => b - a);
  
  container.innerHTML = "";
  
  years.forEach(year => {
    const yearGroup = document.createElement("section");
    yearGroup.className = "year-group";
    
    const yearHeading = document.createElement("h3");
    yearHeading.className = "year-heading";
    yearHeading.textContent = year;
    yearGroup.appendChild(yearHeading);
    
    const cardsGrid = document.createElement("div");
    cardsGrid.className = "cards-grid";
    
    grouped[year].forEach(project => {
      const card = document.createElement("article");
      card.className = "card";
      
      if (project.image) {
        const img = document.createElement("img");
        img.src = project.image;
        img.alt = project.title;
        img.className = "card-thumbnail";
        card.appendChild(img);
      }
      
      const title = document.createElement("h3");
      title.textContent = project.title;
      card.appendChild(title);
      
      const desc = document.createElement("p");
      desc.textContent = project.description;
      card.appendChild(desc);
      
      const link = document.createElement("a");
      link.href = project.link;
      link.target = "_blank";
      link.rel = "noreferrer";
      link.textContent = "Avaa projekti →";
      card.appendChild(link);
      
      cardsGrid.appendChild(card);
    });
    
    yearGroup.appendChild(cardsGrid);
    container.appendChild(yearGroup);
  });
}

document.addEventListener("DOMContentLoaded", renderProjects);
