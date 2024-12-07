<?php
session_start();

if(!isset($_SESSION['username']))
{
    header('location: signin.php');
}

$word_list = ["abandon", "ability", "able", "about", "above", "absent", "absolute", "abstract", "abuse", "academic", 
  "accept", "access", "accident", "accompany", "accomplish", "according", "account", "accurate", "accuse", "achieve",
  "acid", "acoustic", "acquire", "across", "act", "action", "active", "activity", "actor", "actual",
  "adapt", "add", "addition", "address", "adjust", "admin", "admire", "admit", "adopt", "adult",
  "advance", "advantage", "adventure", "advertise", "advice", "advise", "aerial", "affair", "affect", "afford",
  "afraid", "after", "again", "against", "age", "agency", "agenda", "agent", "agree", "ahead",
  "aim", "air", "aircraft", "airline", "airport", "album", "alcohol", "alert", "alien", "align",
  "alike", "alive", "allow", "almost", "alone", "along", "already", "also", "alter", "alternative",
  "although", "always", "amazing", "ambition", "among", "amount", "analysis", "analyze", "ancient", "anger",
  "angle", "angry", "animal", "ankle", "announce", "annual", "another", "answer", "anticipate", "anxiety",
  "anybody", "anymore", "anyone", "anything", "anyway", "apart", "apology", "apparent", "appeal", "appear",
  "apple", "application", "apply", "appoint", "approach", "appropriate", "approve", "approximately", "arbitrary", "architect",
  "area", "argue", "argument", "arise", "arm", "army", "around", "arrange", "arrest", "arrive",
  "article", "artist", "artistic", "asleep", "aspect", "assault", "assemble", "assert", "assess", "assign",
  "assist", "assume", "assure", "athlete", "atmosphere", "attach", "attack", "attempt", "attend", "attention",
  "attitude", "attract", "attribute", "auction", "audience", "author", "authority", "available", "average", "avoid",
  "award", "aware", "awesome", "awful", "baby", "bachelor", "bacon", "badge", "bag", "bake",
  "balance", "ball", "ban", "banana", "band", "bank", "bar", "bare", "bargain", "barrel",
  "base", "basic", "basis", "basket", "battery", "battle", "beach", "bear", "beat", "beautiful",
  "because", "become", "before", "begin", "behavior", "behind", "being", "belief", "believe", "belong",
  "below", "belt", "bench", "bend", "benefit", "best", "better", "between", "beyond", "bicycle",
  "bid", "big", "bike", "bill", "billion", "bind", "biology", "bird", "birth", "birthday",
  "biscuit", "bit", "bite", "bitter", "black", "blade", "blame", "blank", "blanket", "blend",
  "bless", "blind", "block", "blood", "bloom", "blow", "blue", "board", "boat", "body",
  "boil", "bold", "bomb", "bond", "bone", "bonus", "book", "boost", "border", "borrow",
  "boss", "both", "bother", "bottle", "bottom", "bounce", "boundary", "bowl", "box", "boy",
  "brain", "branch", "brand", "brave", "bread", "break", "breakfast", "breathe", "brick", "bridge",
  "brief", "bright", "bring", "broad", "brother", "brown", "brush", "bubble", "budget", "build",
  "bullet", "bunch", "burn", "burst", "bury", "bus", "business", "busy", "butter", "button",
  "buy", "buyer", "cable", "cake", "calculate", "calendar", "call", "camera", "camp", "campaign",
  "campus", "can", "cancel", "cancer", "candidate", "candy", "canvas", "cap", "capable", "capital",
  "capture", "car", "carbon", "card", "care", "career", "careful", "carpet", "carry", "cart",
  "case", "cash", "casino", "cast", "catch", "category", "cattle", "cause", "cease", "ceiling",
  "celebrate", "celebration", "cell", "center", "central", "century", "ceremony", "certain", "chain", "chair",
  "challenge", "champion", "chance", "change", "channel", "chapter", "character", "charge", "charity", "charm",
  "chart", "chase", "cheap", "check", "cheese", "chef", "chemical", "chest", "chicken", "chief",
  "child", "childhood", "chip", "chocolate", "choice", "choose", "chop", "church", "circuit", "citizen",
  "city", "civil", "claim", "class", "classic", "classroom", "clean", "clear", "clerk", "click",
  "client", "climate", "climb", "clinic", "clock", "close", "cloth", "clothes", "cloud", "club",
  "clue", "cluster", "coach", "coal", "coast", "coat", "code", "coffee", "coin", "cold",
  "collapse", "colleague", "collect", "college", "color", "column", "combination", "combine", "come", "comfort",
  "command", "comment", "commercial", "commission", "commit", "committee", "common", "community", "company", "compare",
  "compete", "competition", "complain", "complete", "complex", "complicated", "component", "compose", "compound", "comprehensive",
  "computer", "concept", "concern", "concert", "conclude", "condition", "conduct", "conference", "confidence", "confirm",
  "conflict", "confuse", "congratulate", "connect", "connection", "conscious", "consent", "consequence", "consider", "consist",
  "constant", "construct", "consult", "consume", "contact", "contain", "content", "contest", "context", "continue",
  "contract", "contrast", "contribute", "control", "convert", "convince", "cook", "cookie", "cool", "cooperate",
  "copy", "core", "corner", "correct", "corrupt", "cost", "cotton", "couch", "could", "council",
  "count", "counter", "country", "county", "couple", "courage", "course", "court", "cousin", "cover",
  "cow", "crack", "craft", "crash", "crazy", "cream", "create", "creation", "creative", "creature",
  "credit", "creep", "crew", "crime", "criminal", "crisis", "criteria", "critic", "critical", "criticize",
  "crop", "cross", "crowd", "crucial", "cruel", "cruise", "crush", "cry", "crystal", "cube",
  "cultural", "culture", "cup", "curious", "current", "custom", "customer", "cut", "cycle", "daily",
  "damage", "dance", "danger", "dangerous", "dark", "data", "database", "date", "daughter", "dawn",
  "day", "dead", "deal", "dealer", "dear", "debate", "debt", "decade", "decide", "decision",
  "declare", "decline", "decorate", "decrease", "deep", "defeat", "defend", "defense", "deficit", "define",
  "definitely", "definition", "degree", "delay", "deliver", "demand", "democracy", "demonstrate", "density", "department",
  "depend", "deposit", "depth", "describe", "description", "desert", "deserve", "design", "designer", "desire",
  "desk", "desperate", "despite", "destroy", "detail", "detect", "determine", "develop", "development", "device",
  "devote", "diagram", "dialogue", "diamond", "diary", "dictionary", "die", "diet", "differ", "difference",
  "different", "difficult", "dig", "digital", "dimension", "dinner", "direct", "direction", "director", "dirt",
  "disagree", "disappear", "disaster", "discipline", "discovery", "discuss", "disease", "dish", "dismiss", "display",
  "distance", "distinct", "distinguish", "distribute", "district", "diverse", "divide", "division", "divorce", "doctor",
  "document", "dog", "domestic", "dominant", "dominate", "donate", "door", "double", "doubt", "down",
  "dozen", "draft", "drag", "drama", "dramatic", "draw", "dream", "dress", "drink", "drive",
  "driver", "drop", "drug", "drunk", "dry", "duck", "dude", "due", "dump", "during",
  "dust", "duty", "each", "eager", "ear", "early", "earn", "earth", "ease", "east",
  "easy", "eat", "economic", "economy", "edge", "edit", "educate", "education", "effect", "effective",
  "efficiency", "efficient", "effort", "egg", "either", "elaborate", "elder", "elect", "election", "electric",
  "elegant", "element", "elementary", "eliminate", "elite", "else", "elsewhere", "email", "embarrass", "embrace",
  "emerge", "emergency", "emotion", "emotional", "emphasis", "empire", "employ", "employee", "employer", "employment",
  "empty", "enable", "encounter", "encourage", "end", "enemy", "energy", "enforce", "engage", "engine",
  "engineer", "enhance", "enjoy", "enormous", "enough", "ensure", "enter", "enterprise", "entertain", "enthusiasm",
  "entire", "entrance", "entry", "envelope", "environment", "episode", "equal", "equation", "equipment", "equity",
  "equivalent", "era", "error", "escape", "especially", "essay", "essential", "establish", "estate", "estimate",
  "ethics", "ethnic", "evaluate", "evaluation", "even", "evening", "event", "eventually", "ever", "every",
  "everyone", "everything", "everywhere", "evidence", "evident", "evil", "evolution", "evolve", "exact", "examine",
  "example", "exceed", "excellent", "except", "exception", "exchange", "excite", "exclude", "exclusive", "excuse",
  "execute", "exercise", "exhibit", "exist", "existence", "expand", "expect", "expense", "expensive", "experience",
  "experiment", "expert", "explain", "explicit", "explore", "export", "expose", "express", "extend", "extension",
  "extensive", "extent", "external", "extra", "extract", "extreme", "eye", "fabric", "face", "facility",
  "fact", "factor", "factory", "faculty", "fade", "fail", "failure", "fair", "fairly", "faith",
  "fall", "false", "fame", "family", "famous", "fan", "fantasy", "far", "farm", "farmer",
  "fashion", "fast", "fat", "fate", "father", "fault", "favor", "favorite", "fear", "feature",
  "federal", "fee", "feed", "feel", "feeling", "fellow", "female", "fence", "festival", "few",
  "fiber", "fiction", "field", "fierce", "fight", "figure", "file", "fill", "film", "final",
  "finally", "finance", "financial", "find", "finding", "fine", "finger", "finish", "fire", "firm",
  "first", "fish", "fishing", "fit", "fitness", "fix", "flag", "flame", "flash", "flat",
  "flavor", "flee", "flesh", "flexible", "flight", "float", "flood", "floor", "flour", "flow",
  "flower", "fluid", "fly", "focus", "fold", "follow", "food", "fool", "foot", "football",
  "for", "force", "foreign", "forest", "forever", "forget", "form", "formal", "format", "former",
  "formula", "forth", "fortune", "forward", "found", "foundation", "founder", "fraction", "frame", "framework",
  "free", "freedom", "freeze", "frequent", "fresh", "friend", "friendly", "friendship", "from", "front",
  "fruit", "frustrate", "fuel", "full", "fully", "fun", "function", "fund", "fundamental", "funding",
  "funeral", "funny", "furniture", "further", "future", "gain", "galaxy", "gallery", "game", "gang",
  "gap", "garage", "garden", "garlic", "gas", "gate", "gather", "gaze", "gear", "gender",
  "gene", "general", "generate", "generation", "genetic", "gentle", "gentleman", "genuine", "gesture", "ghost",
  "giant", "gift", "gifted", "girl", "girlfriend", "give", "glad", "glance", "glass", "global",
  "globe", "go", "goal", "god", "gold", "golden", "golf", "good", "government", "governor",
  "grab", "grace", "grade", "gradually", "graduate", "grain", "grand", "grandfather", "grandmother", "grant",
  "grape", "grass", "grateful", "gravity", "great", "green", "greet", "grief", "grind", "grip",
  "grocery", "ground", "group", "grow", "growth", "guarantee", "guard", "guess", "guest", "guide",
  "guilt", "guilty", "gun", "guy", "habit", "habitat", "hair", "half", "hall", "hand",
  "handle", "hang", "happen", "happy", "harbor", "hard", "hardly", "hat", "hate", "have",
  "hazard", "he", "head", "headline", "headquarters", "health", "healthy", "hear", "hearing", "heart",
  "heat", "heaven", "heavily", "heavy", "heel", "height", "helicopter", "hell", "hello", "help",
  "helpful", "hence", "her", "here", "heritage", "hero", "herself", "hey", "hi", "hide",
  "high", "highlight", "highly", "highway", "hill", "him", "himself", "hip", "hire", "his",
  "historian", "historic", "historical", "history", "hit", "hold", "hole", "holiday", "holy", "home",
  "homeless", "honest", "honey", "honor", "hope", "horizon", "hormone", "horn", "horror", "horse",
  "hospital", "host", "hot", "hotel", "hour", "house", "household", "housing", "how", "however",
  "huge", "human", "humor", "hundred", "hungry", "hunt", "hunter", "hunting", "hurt", "husband",
  "hypothesis", "ice", "idea", "ideal", "identification", "identify", "identity", "ignore", "ill", "illegal",
  "illness", "illustrate", "image", "imagination", "imagine", "immediate", "immediately", "immigrant", "immigration", "impact",
  "implement", "implication", "imply", "importance", "important", "impose", "impossible", "impress", "impression", "impressive",
  "improve", "improvement", "impulse", "incentive", "incident", "include", "including", "income", "incorporate", "increase",
  "increased", "increasing", "increasingly", "incredible", "indeed", "independence", "independent", "index", "indicate", "indication",
  "individual", "induce", "industry", "inevitable", "infant", "infection", "inflation", "influence", "inform", "information",
  "ingredient", "initial", "initially", "initiate", "initiative", "injury", "inner", "innocent", "inquiry", "inside",
  "insight", "insist", "inspire", "install", "instance", "instant", "instead", "institution", "instruction", "instructor",
  "instrument", "insurance", "intellectual", "intelligence", "intend", "intense", "intensity", "intention", "interaction", "interest",
  "interior", "internal", "international", "internet", "interpret", "interpretation", "intervention", "interview", "into", "introduce",
  "introduction", "invasion", "invest", "investigate", "investigation", "investment", "investor", "invite", "involve", "involvement",
  "iron", "island", "isolate", "issue", "it", "item", "its", "itself", "jacket", "jail",
  "job", "join", "joint", "joke", "journal", "journalist", "journey", "joy", "judge", "judgment",
  "juice", "jump", "jungle", "junior", "jury", "just", "justice", "justify", "keep", "key",
  "kick", "kid", "kill", "killer", "killing", "kind", "king", "kingdom", "kiss", "kitchen",
  "knee", "knife", "knock", "know", "knowledge", "lab", "label", "labor", "laboratory", "lack",
  "ladder", "lady", "lake", "land", "landscape", "language", "lap", "large", "largely", "last",
  "late", "later", "latter", "laugh", "launch", "law", "lawn", "lawsuit", "lawyer", "lay",
  "layer", "lead", "leader", "leadership", "leading", "leaf", "league", "lean", "learn", "learning",
  "least", "leather", "leave", "left", "leg", "legacy", "legal", "legend", "legislation", "legitimate",
  "lemon", "length", "less", "lesson", "let", "letter", "level", "liberal", "library", "license",
  "lie", "life", "lifestyle", "lifetime", "lift", "light", "like", "likely", "limit", "limitation",
  "limited", "line", "link", "lip", "liquid", "list", "listen", "literally", "literary", "literature",
  "little", "live", "living", "load", "loan", "local", "locate", "location", "lock", "long",
  "long-term", "look", "loose", "lose", "loss", "lost", "lot", "loud", "love", "lovely",
  "lover", "low", "lower", "luck", "lucky", "lunch", "lung", "machine", "mad", "magazine",
  "mail", "main", "mainly", "maintain", "maintenance", "major", "majority", "make", "maker", "makeup",
  "male", "mall", "man", "manage", "management", "manager", "manner", "manufacturer", "many", "map",
  "margin", "mark", "market", "marketing", "marriage", "married", "marry", "mask", "mass", "massive",
  "master", "match", "mate", "material", "math", "matter", "may", "maybe", "mayor", "me",
  "meal", "mean", "meaning", "meanwhile", "measure", "measurement", "meat", "mechanism", "media", "medical",
  "medication", "medicine", "medium", "meet", "meeting", "member", "membership", "memory", "mental", "mention",
  "mentor", "menu", "mere", "merely", "mess", "message", "metal", "meter", "method", "metropolitan",
  "middle", "might", "migration", "mild", "military", "milk", "million", "mind", "mine", "miner",
  "minimize", "minimum", "minister", "minor", "minority", "minute", "miracle", "mirror", "miss", "missile",
  "mission", "mistake", "mix", "mixed", "mixture", "mobile", "mode", "model", "moderate", "modern",
  "modest", "modify", "moment", "money", "monitor", "month", "mood", "moon", "moral", "more",
  "moreover", "morning", "mortgage", "most", "mostly", "mother", "motion", "motivate", "motivation", "motor",
  "mount", "mountain", "mouse", "mouth", "move", "movement", "movie", "much", "multiple", "murder",
  "muscle", "museum", "music", "musical", "musician", "must", "mutual", "my", "myself", "mystery",
  "myth", "nail", "naked", "name", "narrative", "narrow", "nasty", "nation", "national", "native",
  "natural", "naturally", "nature", "near", "nearby", "nearly", "neat", "necessarily", "necessary", "neck",
  "need", "negative", "negotiate", "negotiation", "neighbor", "neighborhood", "neither", "nerve", "nervous", "net",
  "network", "never", "nevertheless", "new", "newly", "news", "newspaper", "next", "nice", "night",
  "nine", "no", "nobody", "nod", "noise", "nomination", "none", "nonetheless", "nor", "normal",
  "normally", "north", "northern", "nose", "not", "note", "nothing", "notice", "notion", "novel",
  "now", "nowhere", "nuclear", "number", "numerous", "nurse", "nut", "object", "objective", "obligation",
  "observation", "observe", "observer", "obtain", "obvious", "obviously", "occasion", "occasionally", "occupation", "occupy",
  "occur", "ocean", "odd", "odds", "of", "off", "offense", "offensive", "offer", "office",
  "officer", "official", "often", "oh", "oil", "okay", "old", "Olympic", "on", "once",
  "one", "ongoing", "onion", "online", "only", "onto", "open", "operate", "operating", "operation",
  "operator", "opinion", "opponent", "opportunity", "oppose", "opposite", "opposition", "option", "or", "orange",
  "order", "ordinary", "organ", "organization", "organize", "orientation", "origin", "original", "originally", "other",
  "otherwise", "ought", "our", "ourselves", "out", "outcome", "outside", "oven", "over", "overall",
  "overcome", "overlook", "owe", "own", "owner", "oxygen", "pace", "pack", "package", "page",
  "pain", "painful", "paint", "painter", "painting", "pair", "pale", "Palestinian", "panel", "panic",
  "pant", "paper", "parent", "park", "parking", "part", "participant", "participate", "participation", "particular",
  "particularly", "partly", "partner", "partnership", "party", "pass", "passage", "passenger", "passion", "past",
  "patch", "path", "patient", "pattern", "pause", "pay", "payment", "peace", "peak", "peer",
  "pen", "penalty", "pencil", "people", "pepper", "per", "perceive", "percent", "percentage", "perception",
  "perfect", "perfectly", "perform", "performance", "perhaps", "period", "permanent", "permission", "permit", "person",
  "personal", "personality", "personally", "personnel", "perspective", "persuade", "pet", "phase", "phenomenon", "philosophy",
  "phone", "photo", "photograph", "photographer", "phrase", "physical", "physically", "physician", "piano", "pick",
  "picture", "pie", "piece", "pig", "pile", "pilot", "pine", "pink", "pipe", "pitch",
  "place", "plan", "plane", "planet", "planning", "plant", "plastic", "plate", "platform", "play",
  "player", "please", "pleasure", "plenty", "plot", "plus", "pocket", "poem", "poet", "poetry",
  "point", "pole", "police", "policy", "political", "politician", "politics", "poll", "pollution", "pool",
  "poor", "pop", "popular", "population", "porch", "port", "portion", "portrait", "portray", "pose",
  "position", "positive", "possess", "possibility", "possible", "possibly", "post", "pot", "potato", "potential",
  "potentially", "pound", "pour", "poverty", "powder", "power", "powerful", "practical", "practice", "pray",
  "prayer", "precisely", "predict", "preference", "pregnancy", "pregnant", "preparation", "prepare", "prescription", "presence",
  "present", "presentation", "preserve", "president", "presidential", "press", "pressure", "pretend", "pretty", "prevent",
  "previous", "previously", "price", "pride", "priest", "primarily", "primary", "prime", "principal", "principle",
  "print", "prior", "priority", "prison", "prisoner", "privacy", "private", "privilege", "prize", "probability",
  "probable", "probably", "problem", "procedure", "proceed", "process", "processing", "produce", "producer", "product",
  "production", "profession", "professional", "professor", "profile", "profit", "program", "progress", "project", "prominent",
  "promise", "promote", "prompt", "proof", "proper", "properly", "property", "proportion", "proposal", "propose",
  "proposed", "prosecutor", "prospect", "protect", "protection", "protein", "protest", "proud", "prove", "provide",
  "provider", "province", "provision", "psychological", "psychologist", "psychology", "public", "publication", "publicly", "publish",
  "publisher", "pull", "punish", "punishment", "purchase", "pure", "purpose", "pursue", "push", "put",
  "qualify", "quality", "quarter", "quarterback", "queen", "question", "quick", "quickly", "quiet", "quietly",
  "quit", "quite", "quote", "race", "racial", "radical", "radio", "rail", "rain", "raise",
  "range", "rank", "rapid", "rapidly", "rare", "rarely", "rat", "rate", "rather", "rating",
  "ratio", "raw", "reach", "react", "reaction", "read", "reader", "reading", "ready", "real",
  "reality", "realize", "really", "realm", "rear", "reason", "reasonable", "recall", "receive", "recent",
  "recently", "recipe", "recognition", "recognize", "recommend", "recommendation", "record", "recording", "recover", "recovery",
  "recruit", "red", "reduce", "reduction", "refer", "reference", "reflect", "reflection", "reform", "refugee",
  "refuse", "regard", "regarding", "regardless", "regime", "region", "regional", "register", "regular", "regularly",
  "regulate", "regulation", "reinforce", "reject", "relate", "relation", "relationship", "relative", "relatively", "relax",
  "release", "relevant", "relief", "religion", "religious", "rely", "remain", "remaining", "remarkable", "remember",
  "remind", "remote", "remove", "repeat", "repeatedly", "replace", "reply", "report", "reporter", "represent",
  "representation", "representative", "republican", "reputation", "request", "require", "requirement", "research", "researcher", "resemble",
  "reservation", "resident", "resist", "resistance", "resolution", "resolve", "resort", "resource", "respect", "respond",
  "response", "responsibility", "responsible", "rest", "restaurant", "restore", "restriction", "result", "retain", "retire",
  "retirement", "return", "reveal", "revenue", "review", "revolution", "rhythm", "rice", "rich", "rid",
  "ride", "rifle", "right", "ring", "rise", "risk", "river", "road", "rock", "role",
  "roll", "romantic", "roof", "room", "root", "rope", "rose", "rough", "roughly", "round",
  "route", "routine", "row", "rub", "rule", "run", "running", "rural", "rush", "Russian",
  "sacred", "sad", "safe", "safety", "sake", "salad", "salary", "sale", "sales", "salt",
  "same", "sample", "sanction", "sand", "satellite", "satisfaction", "satisfy", "sauce", "save", "saving",
  "say", "scale", "scandal", "scared", "scenario", "scene", "schedule", "scheme", "scholar", "scholarship",
  "school", "science", "scientific", "scientist", "scope", "score", "scream", "screen", "script", "sea",
  "search", "season", "seat", "second", "secondary", "secret", "secretary", "section", "sector", "secure",
  "security", "see", "seed", "seek", "seem", "segment", "seize", "select", "selection", "self",
  "sell", "semester", "seminar", "senate", "senator", "send", "senior", "sense", "sensitive", "sentence",
  "separate", "sequence", "series", "serious", "seriously", "serve", "service", "session", "set", "setting",
  "settle", "settlement", "seven", "several", "severe", "sex", "sexual", "shade", "shadow", "shake",
  "shall", "shape", "share", "sharp", "she", "sheet", "shelf", "shell", "shelter", "shift",
  "shine", "ship", "shirt", "shit", "shock", "shoe", "shoot", "shooting", "shop", "shopping",
  "shore", "short", "shortly", "shot", "should", "shoulder", "shout", "show", "shower", "shrug",
  "shut", "sick", "side", "sigh", "sight", "sign", "signal", "significance", "significant", "significantly",
  "silence", "silent", "silver", "similar", "similarly", "simple", "simply", "sin", "since", "sing",
  "singer", "single", "sink", "sir", "sister", "sit", "site", "situation", "six", "size",
  "ski", "skill", "skin", "skirt", "sky", "slave", "sleep", "slice", "slide", "slight",
  "slightly", "slip", "slow", "slowly", "small", "smart", "smell", "smile", "smoke", "smooth",
  "snap", "snow", "so", "so-called", "soccer", "social", "society", "soft", "software", "soil",
  "solar", "soldier", "solid", "solution", "solve", "some", "somebody", "somehow", "someone", "something",
  "sometimes", "somewhat", "somewhere", "son", "song", "soon", "sophisticated", "sorry", "sort", "soul",
  "sound", "soup", "source", "south", "southern", "Soviet", "space", "Spanish", "speak", "speaker",
  "special", "specialist", "species", "specific", "specifically", "speech", "speed", "spend", "spending", "spin",
  "spirit", "spiritual", "split", "spokesman", "sport", "spot", "spread", "spring", "square", "squeeze",
  "stability", "stable", "staff", "stage", "stair", "stake", "stand", "standard", "standing", "star",
  "stare", "start", "state", "statement", "station", "statistics", "status", "stay", "steady","steal", "steel", "step", "stick", "still", "stir", "stock", "stomach", "stone", "stop",
  "storage", "store", "storm", "story", "straight", "strange", "stranger", "strategic", "strategy", "stream",
  "street", "strength", "strengthen", "stress", "stretch", "strike", "string", "strip", "stroke", "strong",
  "strongly", "structure", "struggle", "student", "studio", "study", "stuff", "stupid", "style", "subject",
  "submit", "subsequent", "substance", "substantial", "succeed", "success", "successful", "successfully", "such", "sudden",
  "suddenly", "sue", "suffer", "sufficient", "sugar", "suggest", "suggestion", "suicide", "suit", "summer",
  "summit", "sun", "super", "supply", "support", "supporter", "suppose", "supposed", "Supreme", "sure",
  "surely", "surface", "surgery", "surprise", "surprising", "surprisingly", "surround", "survey", "survival", "survive",
  "survivor", "suspect", "sustain", "swap", "sweep", "sweet", "swim", "swing", "switch", "symbol",
  "symptom", "system", "table", "tablespoon", "tactic", "tail", "take", "tale", "talent", "talk",
  "tall", "tank", "tap", "tape", "target", "task", "taste", "tax", "taxpayer", "tea",
  "teach", "teacher", "teaching", "team", "tear", "teaspoon", "technical", "technique", "technology", "teen",
  "teenager", "telephone", "telescope", "television", "tell", "temperature", "temporary", "ten", "tend", "tendency",
  "tennis", "tension", "tent", "term", "terms", "terrible", "territory", "terror", "terrorism", "terrorist",
  "test", "testify", "testimony", "testing", "text", "than", "thank", "thanks", "that", "the",
  "theater", "their", "them", "theme", "themselves", "then", "theory", "therapy", "there", "therefore",
  "these", "they", "thick", "thin", "thing", "think", "thinking", "third", "thirty", "this",
  "those", "though", "thought", "thousand", "threat", "threaten", "three", "throat", "through", "throughout",
  "throw", "thus", "ticket", "tie", "tight", "time", "tiny", "tip", "tire", "tired",
  "tissue", "title", "to", "tobacco", "today", "toe", "together", "tomato", "tomorrow", "tone",
  "tongue", "tonight", "tool", "tooth", "top", "topic", "toss", "total", "totally", "touch",
  "tour", "tourist", "tournament", "toward", "towards", "tower", "town", "toy", "trace", "track",
  "trade", "tradition", "traditional", "traffic", "tragedy", "trail", "train", "training", "transfer", "transform",
  "transformation", "transition", "translate", "transportation", "travel", "treat", "treatment", "treaty", "tree",
  "tremendous", "trend", "trial", "tribe", "trick", "trip", "troop", "trouble", "truck", "true",
  "truly", "trust", "truth", "try", "tube", "tunnel", "turn", "TV", "twelve", "twenty",
  "twice", "twin", "two", "type", "typical", "typically", "ugly", "ultimate", "ultimately", "unable",
  "uncle", "under", "undergo", "understand", "understanding", "unfortunately", "uniform", "union", "unique", "unit",
  "United", "universal", "universe", "university", "unknown", "unless", "unlike", "unlikely", "until", "unusual",
  "up", "upon", "upper", "urban", "urge", "us", "use", "used", "useful", "user",
  "usual", "usually", "utility", "vacation", "valley", "valuable", "value", "variable", "variation", "variety",
  "various", "vary", "vast", "vegetable", "vehicle", "venture", "version", "versus", "very", "vessel",
  "veteran", "via", "victim", "victory", "video", "view", "viewer", "village", "violate", "violation",
  "violence", "violent", "virtually", "virtue", "virus", "visible", "vision", "visit", "visitor", "visual",
  "vital", "voice", "volume", "volunteer", "vote", "voter", "vulnerable", "wage", "wait", "wake",
  "walk", "wall", "wander", "want", "war", "warm", "warn", "warning", "wash", "waste",
  "watch", "water", "wave", "way", "we", "weak", "wealth", "wealthy", "weapon", "wear",
  "weather", "wedding", "week", "weekend", "weekly", "weigh", "weight", "welcome", "welfare", "well",
  "west", "western", "wet", "what", "whatever", "wheel", "when", "whenever", "where", "whereas",
  "whether", "which", "while", "whisper", "white", "who", "whole", "whom", "whose", "why",
  "wide", "widely", "wife", "wild", "will", "willing", "win", "wind", "window", "wine",
  "wing", "winner", "winter", "wipe", "wire", "wisdom", "wise", "wish", "with", "withdraw",
  "within", "without", "witness", "woman", "wonder", "wonderful", "wood", "wooden", "word", "work",
  "worker", "working", "works", "workshop", "world", "worried", "worry", "worth", "would", "wound",
  "wrap", "write", "writer", "writing", "wrong", "yard", "yeah", "year", "yell", "yellow",
  "yes", "yesterday", "yet", "yield", "you", "young", "your", "yours", "yourself", "youth",
  "zebra", "zero", "zone", "zoom", "zephyr", "zenith", "zeal", "zodiac", "zest", "zinc", "zoo", "zany", 
  "zigzag", "zeppelin", "zombie", "zucchini", "zebrawood", "zillion", "zealous", "zen", "zippy", "zip",
   "zircon", "zit", "zesty", "zygote", "zither", "zenithal", "zoomorphic", "zebu", "zirconium", 
   "zephyranthes", "ziggurat", "zoonotic", "zeppole", "zoonosis", "zonal", "zapped", "zippy", "zilch",
    "zapper", "zing", "zonked", "zoology", "zookeeper", "zeppelins", "zapping", "zodiacal", "zamboni", 
    "zoos", "zeolite", "zingy", "zenlike", "zoophilia", "zaps", "zine", "zymurgy", "zestful", "zoogenesis",
     "zygotic", "zoomed", "zocalo", "zipped", "zwitterion", "zooplankton", "zeitgeist", "zygoma",
      "zibeline", "zippy", "zoanthropy", "zander", "zeniths", "zircaloy", "zircons", "zoisite", "zloty", 
      "zooglea", "zincified", "zoogleal", "zoophobia", "zibelline", "zapateado", "zeolite", "zoarium", 
      "zygomorphic", "zonation", "zygosity", "zingiber", "zoodynamics", "zoolatry", "zoneless", "zeugma",
       "zygodactyl", "zooxanthella", "zarzuela", "zooglea", "zeitgeber", "zooplankton", "zoogeography"
  ];


$word = isset($_SESSION['word']) ? $_SESSION['word'] : $word_list[array_rand($word_list)];
$masked_word = isset($_SESSION['masked_word']) ? $_SESSION['masked_word'] : str_repeat('_', strlen($word));
$attempts = isset($_SESSION['attempts']) ? $_SESSION['attempts'] : 6;
$guessed_letters = isset($_SESSION['guessed_letters']) ? $_SESSION['guessed_letters'] : [];
$_SESSION['word'] = $word;
$_SESSION['masked_word'] = $masked_word;
$_SESSION['attempts'] = $attempts;
$_SESSION['guessed_letters'] = $guessed_letters;
$_SESSION['valid_referrer'] = false;
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Pragma: no-cache"); // HTTP/1.0
header("Expires: 0"); // Proxies
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Zaxisss</title>
    <style>
      .navbar {
            background-color: #f8f9fa; /* Light background for contrast */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        }
        .navbar-brand {
            font-family: 'Arial', sans-serif;
            font-size: 1.8rem;
            font-weight: bold;
            color: #3498db !important;
            display: flex;
            align-items: center; /* Align logo and text vertically */
        }
        .nav-link {
            font-size: 1.1rem;
            margin-right: 15px;
            color: #555 !important;
        }
        .nav-link:hover {
            color: #2980b9 !important;
        }
        .form-control {
            width: 250px;
            border-radius: 25px; /* Rounded corners */
        }
        .btn-outline-success {
            border-radius: 25px; /* Match input rounded corners */
        }
        .btn-logout {
            background-color: #2980b9;
            color: white;
            border-radius: 25px; /* Rounded corners for consistency */
            margin-left: 10px; /* Space between buttons */
        }
        .btn-logout:hover {
            background-color: #FF0000;
        }
        .navbar-toggler {
            border: none; /* Remove border from toggler */
        }
        .navbar-toggler-icon {
            color: #2980b9; /* Toggler icon color */
        }
    .hcontainer {
        width: 50%;
        margin: auto;
        overflow: hidden;
        padding: 20px;
        margin-left: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin-top: 30px;
        float: left;
    }
    .imgcont {
        width: 40%;
        margin: auto;
        overflow: hidden;
        padding: 20px;
        margin-right: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin-top: 30px;
        float: right;
    }
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
    .instagram-link {
            display: flex;
            align-items: center;
        }

        .instagram-link img {
            margin-right: 8px; /* Space between logo and link */
            width: 16px; /* Adjust size as needed */
            height: 16px; /* Adjust size as needed */
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="reset.php">
            <img src="company_logo.jpg" alt="Company Logo" style="width: 40px; height: 40px; margin-right: 10px; border-radius: 50%;">
            Zaxisss
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="reset.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="about.php">About us</a>
                </li>
                <li>
                  <a class="nav-link"><?php echo $_SESSION['username']; ?></a>
                </li> 
                <li>
                  <a class="nav-link"><?php echo "word guessed: ".$_SESSION['score']; ?></a>
                </li>
                <li>
                <a class="nav-link"><?php echo "streak: ".$_SESSION['streak']; ?></a>
                </li> 
            </ul>
            <a class="btn btn-logout" href="logout.php">Logout</a>
        </div>
    </div>
</nav>


<!-- Main Content -->
<div class="hcontainer">
    <h1 style="color: #333;">
    
    Hangman Game
  </h1>
    <p style="font-size: 24px; letter-spacing: 3px; margin: 20px 0;">Word to guess: <span style="color: #2c3e50;"><?php echo $masked_word; ?></span></p>
    <p style="font-size: 20px; color: #e74c3c;">Attempts left: <?php echo $attempts; ?></p>

    <form action="process.php" method="post" style="margin: 20px 0;">
        <label for="letter" style="font-size: 18px;">Guess a letter:</label>
        <input type="text" name="letter" id="letter" maxlength="1" required style="padding: 5px; font-size: 18px; text-align: center; width: 30px; margin-left: 10px;">
        <button type="submit" style="padding: 5px 10px; font-size: 18px; background-color: #3498db; color: white; border: none; cursor: pointer; margin-left: 10px;">Submit</button>
      <?php if($attempts<=2)
      {
        ?><br> <button class="button" onclick="redirectToPage()" style="padding: 5px 10px; font-size: 18px; background-color: #3498db; color: white; border: none; cursor: pointer; margin-left: 10px;">HINT</button>

        <script>
        function redirectToPage() {
            window.location.href = "hint.php";
        }
        </script>
        <?php
       }?>
    </form>

    <p style="font-size: 18px; color: #555;">Guessed letters: <span style="color: #3498db;"><?php echo implode(', ', $guessed_letters); ?></span></p>
</div>

<div class="imgcont">
<?php 
switch($attempts){
  case 6:
    ?> <h1 style="color: #333;">Let's start</h1>
        <img src="hangman0.png">
    <?php break;
  case 5:
    ?> <h1 style="color: #333;">Take it easy</h1>
        <img src="hangman1.png">
  <?php break;
  case 4:
    ?> <h1 style="color: #333;">Don't panickk</h1>
        <img src="hangman2.png">
    <?php break;
  case 3:
    ?> <h1 style="color: #333;">It's getting serious noww</h1>
        <img src="hangman3.png">
  <?php break;
  case 2:
    ?> <h1 style="color: #333;">Be carefulll!!!!!!!!</h1>
        <img src="hangman4.png">
  <?php break;
  case 1:
    ?> <h1 style="color: #333;">Do or dieee..........</h1>
        <img src="hangman5.png">
  <?php break;
}
?>
</div>
<div class="clearfix"></div>


<div style="width: 100%; background-color: #ECEFF1; flex-shrink: 0;">
    <!-- Footer -->
    <footer class="text-center text-lg-start text-dark" style="background-color: #ECEFF1; ">
        <!-- Section: Links  -->
        <section>
            <div class="container text-center text-md-start mt-5" style="width: 100%;">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold">Zaxisss</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px;">
                        <p>Stay tuned for more games!!!!</p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Products</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px;">
                        <p><a href="reset.php" class="text-dark">Hangman</a></p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Follow us</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px;">
                         <p class="instagram-link">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram logo">
                            <a href="https://www.instagram.com/z_axisss/" target="_blank" class="text-dark">Machhindra</a>
                        </p>
                        <p class="instagram-link">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram logo">
                            <a href="https://www.instagram.com/ihruyd/" target="_blank" class="text-dark">Alex</a>
                        </p>    
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Contact</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px;">
                        <p><i class="fas fa-home mr-3"></i> Chyasal, Lalitpur, Nepal</p>
                        <p><i class="fas fa-envelope mr-3"></i> dahalmachhindra8@gmail.com</p>
                        <p><i class="fas fa-envelope mr-3"></i> xelarai973@gmail.com</p>
            <p><i class="fas fa-phone mr-3"></i>+977 982-1234979</p>
            <p><i class="fas fa-print mr-3"></i>+977 981-8435992</p>
          </div>
        </div>
      </div>
    </section>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2024 Copyright:
      <a class="text-dark" href="about.php">Zaxisss</a>
    </div>
  </footer>
</div>
</body>
</html>