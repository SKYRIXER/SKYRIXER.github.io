const projectGroups = {
  laitteet: [
    {
      title: "Pico WH -kiertonuppiohjain",
      status: "Oma projekti · toimiva koekytkentä",
      description: "Rakensin koekytkentälevylle ohjaimen, jossa kiertonupilla selataan OLED-näytön valikkoa. Testasin samassa kytkennässä pyörityksen molempiin suuntiin, nupin painalluksen, neljä painiketta sekä RGB-ledin värin ja kirkkauden säädön.",
      technologies: "Raspberry Pi Pico WH, MicroPython, I²C, kiertoenkooderi, OLED, RGB-ledi"
    },
    {
      title: "ElIran – kameralla toimiva henkilölaskuri",
      status: "HAMKin ryhmäprojekti · toimiva demo",
      description: "Raspberry Pi 5 ja Hailo laskevat kamerakuvasta huoneessa olevat ihmiset. MQTT välittää laskennan Node.js-palvelimelle. Next.js-näkymä näyttää henkilömäärän ja antaa säätää rajaa, jonka mukaan Pi Zeron merkkivalot vaihtuvat.",
      technologies: "Raspberry Pi 5 ja Zero, Hailo, Python, MQTT, Node.js, Next.js"
    },
    {
      title: "GPIO-kytkennät koekytkentälevyllä",
      status: "HAMKin laiteharjoitukset",
      description: "Kytkin ja testasin Raspberry Pi:llä ledejä ja pienen sähkömoottorin. Yhdessä harjoituksessa MQTT-viesti ohjasi vastaanottavan Pi:n lediä. ElIran-demossa testasin kolmen ledin merkkivalon ja korjasin sen johdotusvirheen.",
      technologies: "Raspberry Pi, GPIO, koekytkentälevy, ledit, MQTT"
    },
    {
      title: "Raspberry Pi 5 -kotipalvelin",
      status: "Oma projekti · käytössä",
      description: "Pystytin Raspberry Pi 5:lle Docker-palvelimen, johon otan etäyhteyden Tailscalella. Pi-hole suodattaa DNS-kyselyitä, Uptime Kuma seuraa palveluiden saatavuutta ja Beszel näyttää koneen resurssien käytön.",
      technologies: "Raspberry Pi OS, Docker, Portainer, Tailscale, Pi-hole, Uptime Kuma, Beszel"
    }
  ],
  ohjelmistot: [
    {
      title: "Haikuron.fi",
      status: "2025",
      description: "Toteutin kennelille responsiivisen verkkosivuston, jolla se esittelee toimintaansa ja palveluitaan.",
      technologies: "Next.js, Tailwind CSS",
      image: "./imgs/kennel.jpg",
      links: [
        { label: "Avaa sivusto", href: "https://haikuron.fi" },
        { label: "GitHub", href: "https://github.com/SKYRIXER/Haikuron.fi" }
      ]
    },
    {
      title: "WageWise",
      status: "HAMKin ryhmäprojekti",
      description: "Kehitimme palkkalaskurin ja käyttäjähallinnan sisältävän verkkosovelluksen. Projektissa yhdistimme Blazor-käyttöliittymän, .NET-rajapinnan ja MongoDB:hen tallennettavat käyttäjätiedot.",
      technologies: "C#, Blazor, .NET 8, MongoDB"
    },
    {
      title: "ATCarUI",
      status: "Käyttöliittymäprototyyppi",
      description: "Kehitin Raspberry Pi:lle suunnattua auton multimedianäkymää. Prototyypissä on oma kosketuskäyttöliittymä musiikille, radiolle ja asetuksille.",
      technologies: "Qt, QML, C++, Python"
    },
    {
      title: "Block Tower Defense",
      status: "2024",
      description: "Ensimmäinen kokonainen Unity-peliprojektini. Toteutin pelilogiikan ja käyttöliittymän ja julkaisin pelattavan version Unity Playssa.",
      technologies: "Unity, C#",
      image: "./imgs/unityTD.png",
      links: [{ label: "Pelaa Unity Playssa", href: "https://play.unity.com/mg/other/builds-u4-6" }]
    },
    {
      title: "Kaksikielinen palvelusivusto",
      status: "Kehitysversio",
      description: "Next.js-sivusto, jossa on suomen- ja englanninkieliset palvelu-, hinnasto- ja kampanjasivut.",
      technologies: "Next.js, React, Tailwind CSS"
    },
    {
      title: "Full Stack Open",
      status: "Kurssiharjoituksia",
      description: "React-käyttöliittymiä ja Node.js-rajapintoja. Harjoituksiin kuuluvat esimerkiksi puhelinluettelo ja blogilistan rajapinta.",
      technologies: "React, Vite, JavaScript, Node.js",
      links: [{ label: "GitHub", href: "https://github.com/SKYRIXER/fullstack-hel" }]
    },
    {
      title: "MegaMagnet",
      status: "Modiprojekti",
      description: "Megabonk-pelin modi, joka kasvattaa magneetin kantamaa.",
      links: [{ label: "GitHub", href: "https://github.com/SKYRIXER/Megabonk_MegaMagnet" }]
    }
  ],
  suunnitelmat: [
    {
      title: "IKEA-LED-nauhan Wi-Fi-ohjain",
      description: "Suunnittelen LED-nauhalle ohjainta, jonka avulla valaistusta voisi säätää lähiverkon kautta.",
      technologies: "XIAO ESP32-C6, Wi-Fi, LED-nauha"
    },
    {
      title: "Autokaupan tietokanta",
      status: "HAMKin kurssiprojekti",
      description: "Suunnittelen MySQL-tietokantaa kolmen toimipisteen autokaupalle. Tavoitteena on säilyttää myyntihistoria ja laskea myyjien kuukausittaiset myynnit sekä autojen myyntikatteet.",
      technologies: "MySQL, SQL"
    },
    {
      title: "2D-SG",
      description: "Suunnittelen 2.5D-avaruuspeliä, jossa pelaaja hallitsee kuljetuksia ja resursseja. Planeettojen painovoima vaikuttaa siihen, miten rahti liikkuu aurinkokunnan kartalla.",
      technologies: "Unity, C#"
    }
  ]
};

function createProjectCard(project) {
  const card = document.createElement("article");
  card.className = "card";

  if (project.image) {
    const image = document.createElement("img");
    image.src = project.image;
    image.alt = "";
    image.loading = "lazy";
    image.className = "card-thumbnail";
    card.append(image);
  }

  if (project.status) {
    const status = document.createElement("p");
    status.className = "card-status";
    status.textContent = project.status;
    card.append(status);
  }

  const heading = document.createElement("h4");
  heading.textContent = project.title;
  card.append(heading);

  const description = document.createElement("p");
  description.textContent = project.description;
  card.append(description);

  if (project.technologies) {
    const technologies = document.createElement("p");
    technologies.className = "card-technologies";
    technologies.textContent = project.technologies;
    card.append(technologies);
  }

  if (project.links?.length) {
    const links = document.createElement("div");
    links.className = "card-links";

    for (const projectLink of project.links) {
      const link = document.createElement("a");
      link.href = projectLink.href;
      link.target = "_blank";
      link.rel = "noreferrer";
      link.textContent = projectLink.label;
      link.setAttribute("aria-label", `${project.title} · ${projectLink.label}`);
      links.append(link);
    }

    card.append(links);
  }

  return card;
}

for (const [group, projects] of Object.entries(projectGroups)) {
  const container = document.querySelector(`[data-project-group="${group}"]`);
  container.append(...projects.map(createProjectCard));
}
