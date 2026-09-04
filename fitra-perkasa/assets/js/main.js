/* =========================================================
   PT FITRA PERKASA INTI — Main Script (WordPress)
   ========================================================= */

document.addEventListener("DOMContentLoaded", () => {
  /* ------------------------------------------------
     1. Header shadow and background on scroll
     ------------------------------------------------ */
  const header = document.getElementById("header");

  const onScroll = () => {
    if (!header) return;
    if (window.scrollY > 20) {
      header.classList.add("header--scrolled");
    } else {
      header.classList.remove("header--scrolled");
    }
  };

  window.addEventListener("scroll", onScroll, { passive: true });
  onScroll();

  /* ------------------------------------------------
     2. Mobile hamburger toggle
     ------------------------------------------------ */
  const hamburger = document.getElementById("hamburger");
  const navMenu   = document.getElementById("nav-menu");

  if (hamburger && navMenu) {
    const toggleMenu = (open) => {
      const isOpen = typeof open === "boolean" ? open : !navMenu.classList.contains("open");
      navMenu.classList.toggle("open", isOpen);
      hamburger.classList.toggle("active", isOpen);
      hamburger.setAttribute("aria-expanded", isOpen ? "true" : "false");
      if (header) {
        header.classList.toggle("header--menu-open", isOpen);
      }
      document.body.classList.toggle("menu-open", isOpen);
      document.body.style.overflow = isOpen ? "hidden" : "";
    };

    hamburger.addEventListener("click", (e) => {
      e.stopPropagation();
      toggleMenu();
    });

    // Close menu when a nav link is clicked
    navMenu.querySelectorAll("a").forEach((link) => {
      link.addEventListener("click", () => {
        toggleMenu(false);
      });
    });

    // Close menu on Escape key
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && navMenu.classList.contains("open")) {
        toggleMenu(false);
      }
    });

    // Close menu when clicking outside header & nav
    document.addEventListener("click", (e) => {
      if (navMenu.classList.contains("open") && header && !header.contains(e.target) && !navMenu.contains(e.target)) {
        toggleMenu(false);
      }
    });
  }

  /* ------------------------------------------------
     3. Language switcher interactive toggle
     ------------------------------------------------ */
  const langBtns = document.querySelectorAll(".header__lang-btn");
  langBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      const targetLang = btn.getAttribute("data-lang") || (btn.textContent.trim().toLowerCase() === "id" ? "id" : "en");

      // Save preference in cookies (1 year expiry)
      document.cookie = `fitra_lang=${targetLang};path=/;max-age=31536000;SameSite=Lax`;
      document.cookie = `pll_language=${targetLang};path=/;max-age=31536000;SameSite=Lax`;
      try {
        localStorage.setItem("fitra_lang", targetLang);
      } catch (err) {}

      // If Polylang provided a direct translation URL, navigate to it
      const directUrl = btn.getAttribute("data-url");
      if (directUrl && directUrl !== "#" && directUrl !== window.location.href) {
        window.location.href = directUrl;
        return;
      }

      // Fallback: Retain hash and search params while updating lang
      const url = new URL(window.location.href);
      url.searchParams.set("lang", targetLang);
      window.location.href = url.toString();
    });
  });

  /* ------------------------------------------------
     4. Scroll-reveal animation (IntersectionObserver)
     ------------------------------------------------ */
  const revealElements = document.querySelectorAll(
    ".stat-item, .home-vision__left, .home-vision__right, .service-division-card, .metric-block, .featured-prod-card, .home-rfq__left, .home-rfq__right, .news-card, .cap-card, .capabilities__heading, .vm-card, .operations__header, .operations__main-image, .org-chart__heading, .org-chart__subtitle, .org-card, .legal__info, .legal__details, .legal__badge, .prod-card, .products-hero__title, .products-hero__subtitle, .products-pagination, .products-cta__inner, .pd-hero__gallery, .pd-hero__info, .pd-specs__title, .pd-specs__row, .profile-visi, .profile-misi, .profile-stat-box, .profile-misi-card, .org-box-v2, .org-badge-v2, .tkdn-badge-card, .legal-doc-card, .services-division-panel__left, .services-capability-card, .products-card-v2"
  );

  revealElements.forEach((el) => el.classList.add("reveal"));

  if ("IntersectionObserver" in window) {
    const revealObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("visible");
            revealObserver.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: "0px 0px -30px 0px" }
    );

    revealElements.forEach((el) => revealObserver.observe(el));
  } else {
    // Fallback: show everything if IO not supported
    revealElements.forEach((el) => el.classList.add("visible"));
  }

  /* ------------------------------------------------
     5. Smooth scroll for in-page anchors
     ------------------------------------------------ */
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      const href = this.getAttribute("href");
      if (href && href.length > 1) {
        const target = document.querySelector(href);
        if (target) {
          e.preventDefault();
          const offset = 80;
          const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;
          window.scrollTo({
            top: targetPosition,
            behavior: "smooth"
          });
        }
      }
    });
  });

  /* ------------------------------------------------
     6. Stagger animation delay
     ------------------------------------------------ */
  const statItems = document.querySelectorAll(".stat-item");
  statItems.forEach((item, i) => {
    item.style.transitionDelay = `${i * 0.08}s`;
  });

  const svcCards = document.querySelectorAll(".service-division-card");
  svcCards.forEach((card, i) => {
    card.style.transitionDelay = `${(i % 5) * 0.08}s`;
  });

  const metricBlocks = document.querySelectorAll(".metric-block");
  metricBlocks.forEach((block, i) => {
    block.style.transitionDelay = `${(i % 4) * 0.08}s`;
  });

  const prodCards = document.querySelectorAll(".featured-prod-card, .news-card");
  prodCards.forEach((card, i) => {
    card.style.transitionDelay = `${(i % 3) * 0.1}s`;
  });

  const capabilityCards = document.querySelectorAll(".services-capability-card");
  capabilityCards.forEach((card, i) => {
    card.style.transitionDelay = `${(i % 5) * 0.06}s`;
  });

  /* ------------------------------------------------
     7. Interactive Services Filter Tabs Switcher
     ------------------------------------------------ */
  const filterBtns = document.querySelectorAll(".services-filter-btn");
  const divisionPanels = document.querySelectorAll(".services-division-panel");

  if (filterBtns.length && divisionPanels.length) {
    const switchDivision = (targetDivision, updateHash = true) => {
      // 1. Update active tab buttons
      filterBtns.forEach((btn) => {
        const isActive = btn.dataset.division === targetDivision;
        btn.classList.toggle("services-filter-btn--active", isActive);
        btn.setAttribute("aria-selected", isActive ? "true" : "false");
      });

      // 2. Switch active panel with smooth fade in
      divisionPanels.forEach((panel) => {
        if (panel.dataset.panel === targetDivision) {
          panel.removeAttribute("hidden");
          panel.style.display = "block";
          // Trigger reflow for CSS transition
          void panel.offsetWidth;
          panel.classList.add("services-division-panel--active");

          // Ensure child capability cards are visible
          panel.querySelectorAll(".services-capability-card").forEach((card) => {
            card.classList.add("visible");
          });
        } else {
          panel.classList.remove("services-division-panel--active");
          panel.style.display = "none";
          panel.setAttribute("hidden", "until-found");
        }
      });

      // 3. Update URL hash without jump
      if (updateHash && history.replaceState) {
        history.replaceState(null, "", `#${targetDivision}`);
      }
    };

    filterBtns.forEach((btn) => {
      btn.addEventListener("click", () => {
        const division = btn.dataset.division;
        if (division) {
          switchDivision(division);
        }
      });
    });

    // Handle URL hash on load for services
    const currentHash = window.location.hash.replace("#", "").toLowerCase();
    if (currentHash && document.querySelector(`.services-filter-btn[data-division="${currentHash}"]`)) {
      switchDivision(currentHash, false);
    }
  }

  /* ------------------------------------------------
     8. Interactive Products Category Filter & Pagination
     ------------------------------------------------ */
  const prodFilterBtns  = document.querySelectorAll(".products-filter-btn");
  const productCards    = document.querySelectorAll(".products-card-v2");
  const emptyState      = document.getElementById("products-empty-state");
  const resetBtn        = document.getElementById("btn-reset-filters");
  const paginationNav   = document.getElementById("products-pagination");
  const paginationPages = document.getElementById("prod-pagination-numbers");
  const paginationPrev  = document.getElementById("prod-page-prev");
  const paginationNext  = document.getElementById("prod-page-next");
  const showingCountEl  = document.getElementById("prod-showing-count");
  const totalCountEl    = document.getElementById("prod-total-count");

  if (prodFilterBtns.length && productCards.length) {
    const ITEMS_PER_PAGE = 9;
    let currentFilter    = "all";
    let currentPage      = 1;

    const renderProducts = (updateHash = true, scrollToGrid = false) => {
      // 1. Determine matching cards based on active filter
      const matchingCards = [];
      productCards.forEach((card) => {
        const cardCat = card.dataset.category;
        if (currentFilter === "all" || cardCat === currentFilter) {
          matchingCards.push(card);
        }
      });

      const totalMatches = matchingCards.length;
      const totalPages   = Math.ceil(totalMatches / ITEMS_PER_PAGE) || 1;

      // Ensure currentPage is within bounds
      if (currentPage > totalPages) currentPage = totalPages;
      if (currentPage < 1) currentPage = 1;

      // 2. Hide all cards initially
      productCards.forEach((card) => {
        card.style.opacity = "0";
        card.style.transform = "translateY(12px)";
        card.style.display = "none";
      });

      // 3. Display only the cards for the current page
      const startIndex   = (currentPage - 1) * ITEMS_PER_PAGE;
      const endIndex     = Math.min(startIndex + ITEMS_PER_PAGE, totalMatches);
      const visibleCards = matchingCards.slice(startIndex, endIndex);

      visibleCards.forEach((card, idx) => {
        card.style.display = "flex";
        card.style.transitionDelay = `${(idx % 3) * 0.06}s`;
        void card.offsetWidth;
        card.style.opacity = "1";
        card.style.transform = "translateY(0)";
        card.classList.add("visible");
      });

      // 4. Update Category Tab States
      prodFilterBtns.forEach((btn) => {
        const isActive = btn.dataset.filter === currentFilter;
        btn.classList.toggle("products-filter-btn--active", isActive);
        btn.setAttribute("aria-selected", isActive ? "true" : "false");
      });

      // 5. Empty State
      if (emptyState) {
        emptyState.hidden = totalMatches > 0;
      }

      // 6. Update Pagination UI
      if (paginationNav) {
        if (totalMatches === 0) {
          paginationNav.hidden = true;
        } else {
          paginationNav.hidden = false;

          // Render page buttons
          if (paginationPages) {
            paginationPages.innerHTML = "";
            for (let p = 1; p <= totalPages; p++) {
              const pageBtn = document.createElement("button");
              pageBtn.type = "button";
              pageBtn.className = `products-pagination__page${p === currentPage ? " products-pagination__page--active" : ""}`;
              pageBtn.dataset.page = String(p);
              pageBtn.setAttribute("aria-label", `Halaman ${p}`);
              if (p === currentPage) {
                pageBtn.setAttribute("aria-current", "page");
              }
              pageBtn.textContent = String(p);
              pageBtn.addEventListener("click", () => {
                if (currentPage !== p) {
                  currentPage = p;
                  renderProducts(false, true);
                }
              });
              paginationPages.appendChild(pageBtn);
            }
          }

          // Prev / Next button states
          if (paginationPrev) {
            paginationPrev.disabled = currentPage <= 1;
          }
          if (paginationNext) {
            paginationNext.disabled = currentPage >= totalPages;
          }

          // Showing counters
          if (showingCountEl) {
            showingCountEl.textContent = `${startIndex + 1}-${endIndex}`;
          }
          if (totalCountEl) {
            totalCountEl.textContent = String(totalMatches);
          }
        }
      }

      // 7. Scroll smoothly to catalog top on page change
      if (scrollToGrid) {
        const catalogEl = document.getElementById("products-catalog");
        if (catalogEl) {
          const yOffset = -70;
          const y = catalogEl.getBoundingClientRect().top + window.pageYOffset + yOffset;
          window.scrollTo({ top: y, behavior: "smooth" });
        }
      }

      // 8. Update URL Hash & Search params without stripping language parameters
      if (updateHash && history.replaceState) {
        try {
          const currentUrl = new URL(window.location.href);
          if (currentFilter === "all") {
            currentUrl.searchParams.delete("filter");
            currentUrl.searchParams.delete("cat");
            currentUrl.hash = "";
          } else {
            currentUrl.searchParams.set("filter", currentFilter);
            currentUrl.hash = "products-catalog";
          }
          history.replaceState(null, "", currentUrl.toString());
        } catch (e) {
          const newHash = currentFilter === "all" ? "" : `#${currentFilter}`;
          history.replaceState(null, "", window.location.pathname + window.location.search + newHash);
        }
      }
    };

    // Category button click handlers
    prodFilterBtns.forEach((btn) => {
      btn.addEventListener("click", () => {
        const category = btn.dataset.filter;
        if (category && category !== currentFilter) {
          currentFilter = category;
          currentPage = 1;
          renderProducts(true, false);
        }
      });
    });

    // Reset button handler
    if (resetBtn) {
      resetBtn.addEventListener("click", () => {
        currentFilter = "all";
        currentPage = 1;
        renderProducts(true, false);
      });
    }

    // Pagination Prev / Next button handlers
    if (paginationPrev) {
      paginationPrev.addEventListener("click", () => {
        if (currentPage > 1) {
          currentPage--;
          renderProducts(false, true);
        }
      });
    }

    if (paginationNext) {
      paginationNext.addEventListener("click", () => {
        currentPage++;
        renderProducts(false, true);
      });
    }

    // Make whole card clickable (excluding direct clicks on buttons/links)
    productCards.forEach((card) => {
      card.addEventListener("click", (e) => {
        if (e.target.closest("a, button")) return;
        const targetUrl = card.dataset.url || card.querySelector(".products-card-v2__title a")?.href;
        if (targetUrl) {
          window.location.href = targetUrl;
        }
      });
    });

    // -------------------------------------------------------------------
    // Read filter from URL query param (?filter=... or ?cat=...) or URL hash (#pipes)
    // -------------------------------------------------------------------
    const urlParams = new URLSearchParams(window.location.search);
    const filterFromQuery = (urlParams.get("filter") || urlParams.get("cat") || "").toLowerCase().trim();
    const hashVal = window.location.hash.replace("#", "").toLowerCase().trim();

    let targetFilter = "all";
    let shouldScroll = false;

    if (filterFromQuery && document.querySelector(`.products-filter-btn[data-filter="${filterFromQuery}"]`)) {
      targetFilter = filterFromQuery;
      shouldScroll = true;
    } else if (hashVal && document.querySelector(`.products-filter-btn[data-filter="${hashVal}"]`)) {
      targetFilter = hashVal;
      shouldScroll = true;
    } else if (hashVal === "products-catalog" || hashVal === "products-grid" || hashVal === "products-filter-bar") {
      shouldScroll = true;
    }

    if (targetFilter !== "all") {
      currentFilter = targetFilter;
    }

    // Initial render
    currentPage = 1;
    renderProducts(false, false);

    // If navigated with filter or hash pointing to catalog, smoothly scroll to grid
    if (shouldScroll) {
      setTimeout(() => {
        const catalogEl = document.getElementById("products-catalog") || document.getElementById("products-filter-bar");
        if (catalogEl) {
          const yOffset = -70;
          const y = catalogEl.getBoundingClientRect().top + window.pageYOffset + yOffset;
          window.scrollTo({ top: y, behavior: "smooth" });
        }
      }, 120);
    }
  }

  /* ------------------------------------------------
     9. Product Detail Gallery Thumbnail Slider & Switcher
     ------------------------------------------------ */
  const mainImg = document.getElementById("pd-main-img");
  const thumbTrack = document.getElementById("pd-thumbs-track");
  const thumbItems = document.querySelectorAll(".pd-hero__thumb");
  const prevThumbBtn = document.getElementById("pd-thumb-prev");
  const nextThumbBtn = document.getElementById("pd-thumb-next");

  if (mainImg && thumbItems.length) {
    // Switch main image when thumbnail is clicked
    thumbItems.forEach((thumb) => {
      thumb.addEventListener("click", () => {
        const thumbImg = thumb.querySelector("img");
        if (thumbImg && thumbImg.src && thumbImg.src !== mainImg.src) {
          mainImg.style.transition = "opacity 0.2s ease";
          mainImg.style.opacity = "0.25";
          setTimeout(() => {
            mainImg.src = thumbImg.src;
            mainImg.style.opacity = "1";
          }, 150);
        }
        thumbItems.forEach((t) => t.classList.remove("pd-hero__thumb--active"));
        thumb.classList.add("pd-hero__thumb--active");

        // Keep active thumb visible within track
        if (thumbTrack) {
          thumb.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "nearest" });
        }
      });
    });

    // Slider navigation controls (slide left / slide right)
    if (thumbTrack && (prevThumbBtn || nextThumbBtn)) {
      const updateSliderNav = () => {
        const maxScroll = thumbTrack.scrollWidth - thumbTrack.clientWidth;
        if (maxScroll <= 4) {
          if (prevThumbBtn) prevThumbBtn.disabled = true;
          if (nextThumbBtn) nextThumbBtn.disabled = true;
          return;
        }

        if (prevThumbBtn) {
          prevThumbBtn.disabled = thumbTrack.scrollLeft <= 4;
        }
        if (nextThumbBtn) {
          nextThumbBtn.disabled = thumbTrack.scrollLeft >= maxScroll - 4;
        }
      };

      const getScrollStep = () => {
        const firstThumb = thumbTrack.querySelector(".pd-hero__thumb");
        return firstThumb ? firstThumb.offsetWidth + 12 : 120;
      };

      if (prevThumbBtn) {
        prevThumbBtn.addEventListener("click", () => {
          thumbTrack.scrollBy({ left: -getScrollStep(), behavior: "smooth" });
        });
      }

      if (nextThumbBtn) {
        nextThumbBtn.addEventListener("click", () => {
          thumbTrack.scrollBy({ left: getScrollStep(), behavior: "smooth" });
        });
      }

      thumbTrack.addEventListener("scroll", updateSliderNav, { passive: true });
      window.addEventListener("resize", updateSliderNav, { passive: true });

      // Initial state check
      updateSliderNav();
    }
  }

  /* ------------------------------------------------
     10. Events & News Page (Filter, Search & Pagination)
     ------------------------------------------------ */
  const newsPage = document.getElementById("news-page");
  if (newsPage) {
    const tabs = document.querySelectorAll(".news-tab");
    const searchInput = document.getElementById("news-search-input");
    const searchForm = document.getElementById("news-search-form");
    const featuredSection = document.getElementById("news-featured-section");
    const featuredCard = featuredSection ? featuredSection.querySelector(".news-featured") : null;
    const cards = Array.from(document.querySelectorAll(".news-card"));
    const emptyState = document.getElementById("news-empty");
    const resetBtn = document.getElementById("news-reset-btn");
    const paginationEl = document.getElementById("news-pagination");
    const pageNumbersEl = document.getElementById("news-page-numbers");
    const prevBtn = document.getElementById("news-prev-btn");
    const nextBtn = document.getElementById("news-next-btn");
    const newsletterForm = document.getElementById("news-newsletter-form");

    let currentCategory = "all";
    let currentSearch = "";
    let currentPage = 1;
    const ITEMS_PER_PAGE = 6;

    const renderNews = (scrollToGrid = false) => {
      // 1. Filter matching cards
      const matchedCards = cards.filter((card) => {
        const type = card.dataset.type || "";
        const title = card.dataset.title || "";
        const desc = card.dataset.desc || "";
        const meta = card.dataset.meta || "";

        const matchesCategory = currentCategory === "all" || type === currentCategory;
        const matchesSearch =
          !currentSearch ||
          title.includes(currentSearch) ||
          desc.includes(currentSearch) ||
          meta.includes(currentSearch);

        return matchesCategory && matchesSearch;
      });

      // 2. Filter featured card visibility
      if (featuredSection && featuredCard) {
        const featType = featuredCard.dataset.type || "";
        const featTitle = featuredCard.dataset.title || "";
        const featDesc = featuredCard.dataset.desc || "";

        const featMatchesCat = currentCategory === "all" || featType === currentCategory;
        const featMatchesSearch =
          !currentSearch ||
          featTitle.includes(currentSearch) ||
          featDesc.includes(currentSearch);

        // Hide featured section on page 2+ or when it doesn't match filter
        if (currentPage === 1 && featMatchesCat && featMatchesSearch) {
          featuredSection.style.display = "";
        } else {
          featuredSection.style.display = "none";
        }
      }

      // 3. Handle Empty State
      const totalMatches = matchedCards.length;
      if (totalMatches === 0) {
        cards.forEach((card) => (card.style.display = "none"));
        if (emptyState) emptyState.style.display = "block";
        if (paginationEl) paginationEl.style.display = "none";
        return;
      }

      if (emptyState) emptyState.style.display = "none";

      // 4. Pagination math
      const totalPages = Math.ceil(totalMatches / ITEMS_PER_PAGE);
      if (currentPage > totalPages) currentPage = totalPages;
      if (currentPage < 1) currentPage = 1;

      const startIndex = (currentPage - 1) * ITEMS_PER_PAGE;
      const endIndex = startIndex + ITEMS_PER_PAGE;

      // 5. Render visible cards
      cards.forEach((card) => {
        const isMatched = matchedCards.includes(card);
        if (!isMatched) {
          card.style.display = "none";
        }
      });

      matchedCards.forEach((card, index) => {
        if (index >= startIndex && index < endIndex) {
          card.style.display = "";
        } else {
          card.style.display = "none";
        }
      });

      // 6. Render pagination buttons
      if (paginationEl) {
        if (totalPages <= 1) {
          paginationEl.style.display = "none";
        } else {
          paginationEl.style.display = "flex";

          if (prevBtn) prevBtn.disabled = currentPage <= 1;
          if (nextBtn) nextBtn.disabled = currentPage >= totalPages;

          if (pageNumbersEl) {
            pageNumbersEl.innerHTML = "";
            for (let i = 1; i <= totalPages; i++) {
              const btn = document.createElement("button");
              btn.type = "button";
              btn.className = `news-page-btn ${i === currentPage ? "news-page-btn--active" : ""}`;
              btn.textContent = String(i);
              btn.dataset.page = String(i);
              btn.addEventListener("click", () => {
                currentPage = i;
                renderNews(true);
              });
              pageNumbersEl.appendChild(btn);
            }
          }
        }
      }

      // 7. Scroll smoothly if requested
      if (scrollToGrid) {
        const gridSection = document.querySelector(".news-grid-section");
        if (gridSection) {
          const yOffset = -80;
          const y = gridSection.getBoundingClientRect().top + window.pageYOffset + yOffset;
          window.scrollTo({ top: y, behavior: "smooth" });
        }
      }
    };

    // Category Tabs click handlers
    tabs.forEach((tab) => {
      tab.addEventListener("click", () => {
        const filter = tab.dataset.filter || "all";
        if (filter !== currentCategory) {
          currentCategory = filter;
          currentPage = 1;
          tabs.forEach((t) => t.classList.remove("news-tab--active"));
          tab.classList.add("news-tab--active");
          renderNews(false);
        }
      });
    });

    // Search input handlers
    if (searchInput) {
      searchInput.addEventListener("input", () => {
        currentSearch = searchInput.value.trim().toLowerCase();
        currentPage = 1;
        renderNews(false);
      });
    }

    if (searchForm) {
      searchForm.addEventListener("submit", (e) => {
        e.preventDefault();
        if (searchInput) {
          currentSearch = searchInput.value.trim().toLowerCase();
          currentPage = 1;
          renderNews(false);
        }
      });
    }

    // Reset button handler
    if (resetBtn) {
      resetBtn.addEventListener("click", () => {
        currentCategory = "all";
        currentSearch = "";
        currentPage = 1;
        if (searchInput) searchInput.value = "";
        tabs.forEach((t) => {
          t.classList.toggle("news-tab--active", t.dataset.filter === "all");
        });
        renderNews(false);
      });
    }

    // Prev / Next pagination
    if (prevBtn) {
      prevBtn.addEventListener("click", () => {
        if (currentPage > 1) {
          currentPage--;
          renderNews(true);
        }
      });
    }

    if (nextBtn) {
      nextBtn.addEventListener("click", () => {
        currentPage++;
        renderNews(true);
      });
    }

    // Newsletter Form
    if (newsletterForm) {
      newsletterForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const emailInput = newsletterForm.querySelector('input[type="email"]');
        const submitBtn = newsletterForm.querySelector('button[type="submit"]');
        if (emailInput && emailInput.value) {
          const origText = submitBtn ? submitBtn.textContent : "";
          const isId = (document.documentElement.lang || "").toLowerCase().startsWith("id");
          if (submitBtn) {
            submitBtn.textContent = isId ? "Tersimpan ✓" : "Subscribed ✓";
            submitBtn.style.background = "#10b981";
            submitBtn.style.color = "#ffffff";
          }
          emailInput.value = "";
          setTimeout(() => {
            if (submitBtn) {
              submitBtn.textContent = origText;
              submitBtn.style.background = "";
              submitBtn.style.color = "";
            }
          }, 3000);
        }
      });
    }

    // Initial render
    renderNews(false);
  }

  /* ------------------------------------------------
     12. News & Event Detail Page Interactions
     ------------------------------------------------ */
  const copyBtn = document.getElementById("nd-copy-btn");
  const shareBtn = document.getElementById("nd-share-btn");
  const copiedToast = document.getElementById("nd-share-copied");
  const datasheetForm = document.getElementById("nd-datasheet-form");

  if (copyBtn) {
    copyBtn.addEventListener("click", () => {
      const url = window.location.href;
      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(url).then(() => {
          showCopiedToast();
        }).catch(() => {
          fallbackCopy(url);
        });
      } else {
        fallbackCopy(url);
      }
    });
  }

  function fallbackCopy(text) {
    const input = document.createElement("input");
    input.value = text;
    document.body.appendChild(input);
    input.select();
    try {
      document.execCommand("copy");
      showCopiedToast();
    } catch (e) {
      console.warn("Copy failed:", e);
    }
    document.body.removeChild(input);
  }

  function showCopiedToast() {
    if (!copiedToast) return;
    copiedToast.style.display = "inline-block";
    setTimeout(() => {
      copiedToast.style.display = "none";
    }, 2500);
  }

  if (shareBtn) {
    shareBtn.addEventListener("click", () => {
      if (navigator.share) {
        navigator.share({
          title: document.title,
          url: window.location.href,
        }).catch(() => {});
      } else {
        if (copyBtn) {
          copyBtn.click();
        }
      }
    });
  }

  if (datasheetForm) {
    datasheetForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const emailInput = datasheetForm.querySelector('input[type="email"]');
      const submitBtn = datasheetForm.querySelector('button[type="submit"]');
      if (emailInput && emailInput.value) {
        const origText = submitBtn ? submitBtn.textContent : "";
        const isId = (document.documentElement.lang || "").toLowerCase().startsWith("id");
        if (submitBtn) {
          submitBtn.textContent = isId ? "Datasheet Dikirim ✓" : "Datasheet Sent ✓";
          submitBtn.style.background = "#10b981";
        }
        emailInput.value = "";
        setTimeout(() => {
          if (submitBtn) {
            submitBtn.textContent = origText;
            submitBtn.style.background = "";
          }
        }, 3500);
      }
    });
  }

  /* ------------------------------------------------
     13. Contact Us Page Interactions
     ------------------------------------------------ */
  // FAQ Accordion Toggle
  const faqTriggers = document.querySelectorAll(".faq-item__trigger");
  faqTriggers.forEach((trigger) => {
    trigger.addEventListener("click", () => {
      const item = trigger.closest(".faq-item");
      if (!item) return;

      const isOpen = item.classList.contains("faq-item--open");

      // Close all accordion items for clean accordion behavior
      document.querySelectorAll(".faq-item").forEach((other) => {
        other.classList.remove("faq-item--open");
        const btn = other.querySelector(".faq-item__trigger");
        if (btn) btn.setAttribute("aria-expanded", "false");
      });

      // Toggle current item
      if (!isOpen) {
        item.classList.add("faq-item--open");
        trigger.setAttribute("aria-expanded", "true");
      }
    });
  });

  // Contact Form Character Counter
  const messageInput = document.getElementById("cf-message");
  const counterVal = document.getElementById("cf-counter-val");
  if (messageInput && counterVal) {
    messageInput.addEventListener("input", () => {
      counterVal.textContent = messageInput.value.length;
    });
  }

  // Contact Form Submission
  const contactForm = document.getElementById("contact-form");
  const contactSuccessMsg = document.getElementById("cf-success-msg");
  const contactSubmitBtn = document.getElementById("cf-submit-btn");

  if (contactForm && contactSubmitBtn) {
    contactForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const origText = contactSubmitBtn.innerHTML;
      const isId = (document.documentElement.lang || "").toLowerCase().startsWith("id");
      contactSubmitBtn.innerHTML = isId ? "Mengirim..." : "Sending...";
      contactSubmitBtn.style.opacity = "0.75";
      contactSubmitBtn.disabled = true;

      setTimeout(() => {
        contactSubmitBtn.innerHTML = isId ? "Terkirim ✓" : "Sent ✓";
        contactSubmitBtn.style.background = "#10b981";
        contactSubmitBtn.style.opacity = "1";

        if (contactSuccessMsg) {
          contactSuccessMsg.style.display = "flex";
        }

        contactForm.reset();
        if (counterVal) counterVal.textContent = "0";

        setTimeout(() => {
          contactSubmitBtn.innerHTML = origText;
          contactSubmitBtn.style.background = "";
          contactSubmitBtn.disabled = false;
        }, 4000);
      }, 700);
    });
  }

  // FAQ Quick Inquiry Form
  const faqForm = document.getElementById("contact-faq-form");
  const faqFeedback = document.getElementById("faq-feedback");
  const faqSubmitBtn = document.getElementById("faq-submit-btn");

  if (faqForm && faqSubmitBtn) {
    faqForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const emailInput = document.getElementById("faq-quick-email");
      if (emailInput && emailInput.value) {
        const origText = faqSubmitBtn.textContent;
        const isId = (document.documentElement.lang || "").toLowerCase().startsWith("id");
        faqSubmitBtn.textContent = isId ? "Terkirim ✓" : "Sent ✓";
        faqSubmitBtn.style.background = "#10b981";
        if (faqFeedback) faqFeedback.style.display = "block";
        emailInput.value = "";

        setTimeout(() => {
          faqSubmitBtn.textContent = origText;
          faqSubmitBtn.style.background = "";
          if (faqFeedback) faqFeedback.style.display = "none";
        }, 4000);
      }
    });
  }
});

